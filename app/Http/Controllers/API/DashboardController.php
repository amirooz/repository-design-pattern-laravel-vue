<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Contracts\DistrictRepository;
use App\Models\District;

class DashboardController extends Controller
{
    private $district;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DistrictRepository $district)
    {
        $this->district = $district;
        $this->middleware('auth:api');
        $this->middleware('permission:district-list|district-create|district-edit|district-delete', ['only' => ['index','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $where['id'] = $id;
        $results = $this->district
        ->join('members', function($join)  {
			$join->on('districts.id', '=', 'members.district_id');
        })
        ->where('members.district_id', '=', $id)
        ->select('districts.name as district_name','districts.image as district_image','members.id as serial',
            'members.name as member_name','members.member_type as type','members.designation as 
            designation','members.post_for_committee as post_committee','members.committee_name as committee',
            'members.mobile as mobile','members.district_id as district_id','members.row_status as status')
        ->groupBy('district_name','district_image','serial','member_name','type','committee',
        'designation','post_committee','mobile','word_no','status')
        ->orderBy('status', 'asc')
        ->orderBy('serial', 'asc')
        ->get();

        $distinfo = [];
        $distexecutive = [];
        $distcouncil = [];
        $upazila = [];

        foreach($results as $key => $result)
        {

            $types = explode(' ',$result->type);
            $type = strtolower($types[2]);
            if (strpos($result->committee, 'Upazilla Council') !== false)
            {
                //populate data into info tab
                $distinfo = [
                    'serial' => $result->serial,
                    'member_name' => $result->member_name,
                    'type' => $result->type,
                    'committee' => $result->committee,
                    'designation' => $result->designation,
                    'post_committee' => $result->post_committee,
                    'mobile' => $result->mobile,
                    'district_id' => $result->district_id,
                    'district_name' => $result->district_name,
                    'district_image' => $result->district_image,

                ];

                if (strpos($result->committee, 'Upazilla Executive') !== false)
                {
                    if (strpos($result->committee, 'Zilla Council') !== false)
                    {
                        if (strpos($result->committee, 'Zilla Executive') !== false)
                        {
                            $show = '';
                            if($type == 'mainstream')
                            {
                                $show = '-show-active';
                            }
                            
                            //populate data into district executive tab
                            $distexecutive['executive'][$type.$show][] = [
                                'serial' => $result->serial,
                                'member_name' => $result->member_name,
                                'type' => $result->type,
                                'committee' => $result->committee,
                                'designation' => $result->designation,
                                'post_committee' => $result->post_committee,
                                'mobile' => $result->mobile,
                                'word_no' => $result->word_no,
                                'district_name' => $result->district_name,
                                'district_image' => $result->district_image,
        
                            ];
                        }

                        $show = '';
                        if($type == 'mainstream')
                        {
                            $show = '-show-active';
                        }
                        
                        //populate data into district council tab
                        $distcouncil['council'][$type.$show][] = [
                            'serial' => $result->serial,
                            'member_name' => $result->member_name,
                            'type' => $result->type,
                            'committee' => $result->committee,
                            'designation' => $result->designation,
                            'post_committee' => $result->post_committee,
                            'mobile' => $result->mobile,
                            'word_no' => $result->word_no,
                            'district_name' => $result->district_name,
                            'district_image' => $result->district_image,
    
                        ];
                    }

                    // $show = '';
                    // $wshow = '';
                    // if($type == 'mainstream')
                    // {
                    //     $show = '-show-active';
                    // }
                    // if($result->word_no == 1)
                    // {
                    //     $wshow = '-show-active';
                    // }

                    // //populate data into district ward executive tab
                    // $word['word']['word-'.$result->word_no.$wshow]['executive'][$type.$show][] = [
                    //     'serial' => $result->serial,
                    //     'member_name' => $result->member_name,
                    //     'type' => $result->type,
                    //     'committee' => $result->committee,
                    //     'designation' => $result->designation,
                    //     'post_committee' => $result->post_committee,
                    //     'mobile' => $result->mobile,
                    //     'word_no' => $result->word_no,
                    //     'district_name' => $result->district_name,
                    //     'district_image' => $result->district_image,

                    // ];
                }
                
                // $show = '';
                // $wshow = '';
                // if($type == 'mainstream')
                // {
                //     $show = '-show-active';
                // }
                // if($result->word_no == 1)
                // {
                //     $wshow = '-show-active';
                // }

                // //populate data into district ward council tab
                // $word['word']['word-'.$result->word_no.$wshow]['council'][$type.$show][] = [
                //     'serial' => $result->serial,
                //     'member_name' => $result->member_name,
                //     'type' => $result->type,
                //     'committee' => $result->committee,
                //     'designation' => $result->designation,
                //     'post_committee' => $result->post_committee,
                //     'mobile' => $result->mobile,
                //     'word_no' => $result->word_no,
                //     'district_name' => $result->district_name,
                //     'district_image' => $result->district_image,

                // ];
                
            }
        }

        // echo '<pre>';
        // print_r($distexecutive);
        // exit;

        return [$distinfo,$distexecutive,$distcouncil];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
