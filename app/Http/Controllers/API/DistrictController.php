<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\DivisionRepository;
use Illuminate\Support\Arr;
use App\Models\District;

class DistrictController extends Controller
{
    private $district;
    private $division;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DistrictRepository $district, DivisionRepository $division)
    {
        $this->district = $district;
        $this->division = $division;
        $this->middleware('auth:api');
        $this->middleware('permission:district-list|district-create|district-edit|district-delete', ['only' => ['index','store']]);
        $this->middleware('permission:district-create', ['only' => ['create','store']]);
        $this->middleware('permission:district-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:district-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Arr::pluck($this->division->get(),'name', 'id');
        $district = District::paginate(20);
        // $district = $this->district->get();
        return [$division, $district];

        // return District::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/district/').$name);

            $request->merge(['image' => $name]);
        }

        $district = $this->district->create($request->except(['id']));

        if ($district) {
            return ['success' => 'District created Successfully'];
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
        // $where['id'] = $id;
        $districtData = $this->district
        ->join('members', function($join)  {
			$join->on('districts.id', '=', 'members.district_id');
        })
        ->where('members.district_id', '=', $id)
        ->select('districts.name as district_name','districts.image as district_image','members.id as serial','members.name as member_name','members.member_type as type','members.designation as designation','members.committee_name as committee')
        ->groupBy('district_name','district_image','serial','member_name','type','designation','committee')
        ->get();

        return $districtData;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lookup($id)
    {
        $where['division_id'] = $id;
        $district = Arr::pluck($this->district->where($where)->get(),'name', 'id');
        return [$district];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, $id)
    {
        $data = $this->district->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/district/').$name);

            $request->merge(['image' => $name]);

            $districtImage = public_path('/assets/img/district/').$currentImage;

            if(file_exists($districtImage))
            {
                @unlink($districtImage);
            }
        }

        $district = $this->district->update($id, $request->except(['id']));
        if ($district) {
            return ['success' => 'District updated Successfully'];
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
        $this->district->delete($id);
        return ['message' => 'District deleted Successfully'];
    }
}
