<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionRequest;
use App\Repositories\Contracts\DivisionRepository;
use App\Models\Division;

class DivisionController extends Controller
{
    private $division;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DivisionRepository $division)
    {
        $this->division = $division;
        $this->middleware('auth:api');
        $this->middleware('permission:division-list|division-create|division-edit|division-delete', ['only' => ['index','store']]);
        $this->middleware('permission:division-create', ['only' => ['create','store']]);
        $this->middleware('permission:division-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:division-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $division = $this->division->get();
        return Division::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/division/').$name);

            $request->merge(['image' => $name]);
        }

        $division = $this->division->create($request->except(['id']));

        if ($division) {
            return ['success' => 'Division created Successfully'];
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, $id)
    {
        $data = $this->division->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/division/').$name);

            $request->merge(['image' => $name]);

            $divisionImage = public_path('/assets/img/division/').$currentImage;

            if(file_exists($divisionImage))
            {
                @unlink($divisionImage);
            }
        }

        $division = $this->division->update($id, $request->except(['id']));
        if ($division) {
            return ['success' => 'Division updated Successfully'];
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
        $this->division->delete($id);
        return ['message' => 'Division deleted Successfully'];
    }
}
