<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PourashavaRequest;
use App\Repositories\Contracts\PourashavaRepository;
use App\Repositories\Contracts\UpazillaRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\DivisionRepository;
use Illuminate\Support\Arr;
use App\Models\Pourashava;

class PourashavaController extends Controller
{
    private $pourashava;
    private $upazilla;
    private $district;
    private $division;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PourashavaRepository $pourashava, UpazillaRepository $upazilla, DistrictRepository $district, DivisionRepository $division)
    {
        $this->pourashava = $pourashava;
        $this->upazilla = $upazilla;
        $this->district = $district;
        $this->division = $division;
        $this->middleware('auth:api');
        $this->middleware('permission:pourashava-list|pourashava-create|pourashava-edit|pourashava-delete', ['only' => ['index','store']]);
        $this->middleware('permission:pourashava-create', ['only' => ['create','store']]);
        $this->middleware('permission:pourashava-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pourashava-delete', ['only' => ['destroy']]);
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
        $pourashava = Pourashava::latest()->paginate(10);
        return [$division, $district, $upazilla, $pourashava];

        // return Pourashava::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PourashavaRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/pourashava/').$name);

            $request->merge(['image' => $name]);
        }

        $pourashava = $this->pourashava->create($request->except(['id']));

        if ($pourashava) {
            return ['success' => 'Pourashava created Successfully'];
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
        // $where['upazilla_id'] = $id;
        // $pourashava = Arr::pluck($this->pourashava->where($where)->get(),'name', 'id');
        // return [$pourashava];
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
        $pourashava = Arr::pluck($this->pourashava->where($where)->get(),'name', 'id');
        return [$pourashava];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PourashavaRequest $request, $id)
    {
        $data = $this->pourashava->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/pourashava/').$name);

            $request->merge(['image' => $name]);

            $pourashavaImage = public_path('/assets/img/pourashava/').$currentImage;

            if(file_exists($pourashavaImage))
            {
                @unlink($pourashavaImage);
            }
        }

        $pourashava = $this->pourashava->update($id, $request->except(['id']));
        if ($pourashava) {
            return ['success' => 'Pourashava updated Successfully'];
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
        $this->pourashava->delete($id);
        return ['message' => 'Pourashava deleted Successfully'];
    }
}
