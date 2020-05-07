<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpazillaRequest;
use App\Repositories\Contracts\UpazillaRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\DivisionRepository;
use Illuminate\Support\Arr;
use App\Models\Upazilla;
use Illuminate\Support\Facades\DB;

class UpazillaController extends Controller
{
    private $upazilla;
    private $district;
    private $division;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UpazillaRepository $upazilla, DistrictRepository $district, DivisionRepository $division)
    {
        $this->upazilla = $upazilla;
        $this->district = $district;
        $this->division = $division;
        $this->middleware('auth:api');
        $this->middleware('permission:upazilla-list|upazilla-create|upazilla-edit|upazilla-delete', ['only' => ['index','store']]);
        $this->middleware('permission:upazilla-create', ['only' => ['create','store']]);
        $this->middleware('permission:upazilla-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:upazilla-delete', ['only' => ['destroy']]);
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
        $upazilla = Upazilla::paginate(50);
        return [$division, $district, $upazilla];
        // return Upazilla::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpazillaRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/upazilla/').$name);

            $request->merge(['image' => $name]);
        }

        $upazilla = $this->upazilla->create($request->except(['id']));

        if ($upazilla) {
            return ['success' => 'Upazilla created Successfully'];
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
        $where['district_id'] = $id;
        $upazilla = Arr::pluck($this->upazilla->where($where)->get(),'name', 'id');
        return [$upazilla];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lookup($id)
    {
        $where['district_id'] = $id;
        $upazilla = Arr::pluck($this->upazilla->where($where)->get(),'name', 'id');
        return [$upazilla];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpazillaRequest $request, $id)
    {
        $data = $this->upazilla->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/upazilla/').$name);

            $request->merge(['image' => $name]);

            $upazillaImage = public_path('/assets/img/upazilla/').$currentImage;

            if(file_exists($upazillaImage))
            {
                @unlink($upazillaImage);
            }
        }

        $upazilla = $this->upazilla->update($id, $request->except(['id']));
        if ($upazilla) {
            return ['success' => 'Upazilla updated Successfully'];
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
        $this->upazilla->delete($id);
        return ['message' => 'Upazilla deleted Successfully'];
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
            $upazilla = Upazilla::where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('district_id', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $upazilla = Upazilla::paginate(20);
        }
        return $upazilla;
    }
}
