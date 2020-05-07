<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThanaRequest;
use App\Repositories\Contracts\ThanaRepository;
use App\Repositories\Contracts\MahanagarRepository;
use Illuminate\Support\Arr;
use App\Models\Thana;

class ThanaController extends Controller
{
    private $thana;
    private $mahanagar;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ThanaRepository $thana, MahanagarRepository $mahanagar)
    {
        $this->thana = $thana;
        $this->mahanagar = $mahanagar;
        $this->middleware('auth:api');
        $this->middleware('permission:thana-list|thana-create|thana-edit|thana-delete', ['only' => ['index','store']]);
        $this->middleware('permission:thana-create', ['only' => ['create','store']]);
        $this->middleware('permission:thana-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:thana-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahanagar = Arr::pluck($this->mahanagar->get(),'name', 'id');
        $thana = Thana::paginate(10);
        return [$mahanagar, $thana];
        
        // return Thana::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanaRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/thana/').$name);

            $request->merge(['image' => $name]);
        }

        $thana = $this->thana->create($request->except(['id']));

        if ($thana) {
            return ['success' => 'Thana created Successfully'];
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
    public function update(ThanaRequest $request, $id)
    {
        $data = $this->thana->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/thana/').$name);

            $request->merge(['image' => $name]);

            $thanaImage = public_path('/assets/img/thana/').$currentImage;

            if(file_exists($thanaImage))
            {
                @unlink($thanaImage);
            }
        }

        $thana = $this->thana->update($id, $request->except(['id']));
        if ($thana) {
            return ['success' => 'Thana updated Successfully'];
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
        $this->thana->delete($id);
        return ['message' => 'Thana deleted Successfully'];
    }
}
