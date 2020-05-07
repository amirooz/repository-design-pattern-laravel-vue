<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnionRequest;
use App\Repositories\Contracts\UnionRepository;
use App\Repositories\Contracts\UpazillaRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\DivisionRepository;
use Illuminate\Support\Arr;
use App\Models\Union;

class UnionController extends Controller
{
    private $union;
    private $upazilla;
    private $district;
    private $division;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UnionRepository $union, UpazillaRepository $upazilla, DistrictRepository $district, DivisionRepository $division)
    {
        $this->union = $union;
        $this->upazilla = $upazilla;
        $this->district = $district;
        $this->division = $division;
        $this->middleware('auth:api');
        $this->middleware('permission:union-list|union-create|union-edit|union-delete', ['only' => ['index','store']]);
        $this->middleware('permission:union-create', ['only' => ['create','store']]);
        $this->middleware('permission:union-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:union-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Arr::pluck($this->division->get(),'name', 'id');
        $district = Arr::pluck($this->district->get(),'name', 'id');
        $upazilla = Arr::pluck($this->upazilla->get(),'name', 'id');
        $union = Union::latest()->paginate(50);
        return [$division, $district, $upazilla, $union];
        // return Union::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnionRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/union/').$name);

            $request->merge(['image' => $name]);
        }

        $union = $this->union->create($request->except(['id']));

        if ($union) {
            return ['success' => 'Union created Successfully'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = $this->union
        ->join('members', function($join)  {
			$join->on('unions.id', '=', 'members.union_id');
        })
        ->where('members.union_id', '=', $id)
        ->select('unions.name as union_name','unions.image as union_image','members.id as serial',
            'members.name as member_name','members.member_type as type','members.designation as 
            designation','members.post_for_committee as post_committee','members.committee_name as committee',
            'members.mobile as mobile','members.word_no as word_no','members.row_status as status')
        ->groupBy('union_name','union_image','serial','member_name','type','committee',
        'designation','post_committee','mobile','word_no','status')
        ->orderBy('status', 'asc')
        ->orderBy('serial', 'asc')
        ->get();

        $uninfo = [];
        $unexecutive = [];
        $uncouncil = [];
        $word = [];

        foreach($results as $key => $result)
        {

            $types = explode(' ',$result->type);
            $type = strtolower($types[2]);
            if (strpos($result->committee, 'Union Ward Council') !== false)
            {
                //populate data into info tab
                $uninfo = [
                    'serial' => $result->serial,
                    'member_name' => $result->member_name,
                    'type' => $result->type,
                    'committee' => $result->committee,
                    'designation' => $result->designation,
                    'post_committee' => $result->post_committee,
                    'mobile' => $result->mobile,
                    'word_no' => $result->word_no,
                    'union_name' => $result->union_name,
                    'union_image' => $result->union_image,

                ];

                if (strpos($result->committee, 'Union Ward Executive') !== false)
                {
                    if (strpos($result->committee, 'Union Council') !== false)
                    {
                        if (strpos($result->committee, 'Union Executive') !== false)
                        {
                            $show = '';
                            if($type == 'mainstream')
                            {
                                $show = '-show-active';
                            }
                            
                            //populate data into union executive tab
                            $unexecutive['executive'][$type.$show][] = [
                                'serial' => $result->serial,
                                'member_name' => $result->member_name,
                                'type' => $result->type,
                                'committee' => $result->committee,
                                'designation' => $result->designation,
                                'post_committee' => $result->post_committee,
                                'mobile' => $result->mobile,
                                'word_no' => $result->word_no,
                                'union_name' => $result->union_name,
                                'union_image' => $result->union_image,
        
                            ];
                        }

                        $show = '';
                        if($type == 'mainstream')
                        {
                            $show = '-show-active';
                        }
                        
                        //populate data into union council tab
                        $uncouncil['council'][$type.$show][] = [
                            'serial' => $result->serial,
                            'member_name' => $result->member_name,
                            'type' => $result->type,
                            'committee' => $result->committee,
                            'designation' => $result->designation,
                            'post_committee' => $result->post_committee,
                            'mobile' => $result->mobile,
                            'word_no' => $result->word_no,
                            'union_name' => $result->union_name,
                            'union_image' => $result->union_image,
    
                        ];
                    }

                    $show = '';
                    $wshow = '';
                    if($type == 'mainstream')
                    {
                        $show = '-show-active';
                    }
                    if($result->word_no == 1)
                    {
                        $wshow = '-show-active';
                    }

                    //populate data into union ward executive tab
                    $word['word']['word-'.$result->word_no.$wshow]['executive'][$type.$show][] = [
                        'serial' => $result->serial,
                        'member_name' => $result->member_name,
                        'type' => $result->type,
                        'committee' => $result->committee,
                        'designation' => $result->designation,
                        'post_committee' => $result->post_committee,
                        'mobile' => $result->mobile,
                        'word_no' => $result->word_no,
                        'union_name' => $result->union_name,
                        'union_image' => $result->union_image,

                    ];
                }
                
                $show = '';
                $wshow = '';
                if($type == 'mainstream')
                {
                    $show = '-show-active';
                }
                if($result->word_no == 1)
                {
                    $wshow = '-show-active';
                }

                //populate data into union ward council tab
                $word['word']['word-'.$result->word_no.$wshow]['council'][$type.$show][] = [
                    'serial' => $result->serial,
                    'member_name' => $result->member_name,
                    'type' => $result->type,
                    'committee' => $result->committee,
                    'designation' => $result->designation,
                    'post_committee' => $result->post_committee,
                    'mobile' => $result->mobile,
                    'word_no' => $result->word_no,
                    'union_name' => $result->union_name,
                    'union_image' => $result->union_image,

                ];
                
            }
        }

        // echo '<pre>';
        // print_r($unexecutive);
        // exit;

        return [$uninfo,$unexecutive,$uncouncil,$word];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lookup($id)
    {
        $where['upazilla_id'] = $id;
        $union = Arr::pluck($this->union->where($where)->get(),'name', 'id');
        return [$union];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnionRequest $request, $id)
    {
        $data = $this->union->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/union/').$name);

            $request->merge(['image' => $name]);

            $unionImage = public_path('/assets/img/union/').$currentImage;

            if(file_exists($unionImage))
            {
                @unlink($unionImage);
            }
        }

        $union = $this->union->update($id, $request->except(['id']));
        if ($union) {
            return ['success' => 'Union updated Successfully'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->union->delete($id);
        return ['message' => 'Union deleted Successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if($search = \Request::get('q')){
            $union = Union::where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('district_id', 'LIKE', "%$search%")
                        ->orWhere('upazilla_id', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $union = Union::latest()->paginate(20);
        }
        return $union;
    }
}
