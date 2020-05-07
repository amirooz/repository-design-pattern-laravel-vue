<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MahanagarRequest;
use App\Repositories\Contracts\MahanagarRepository;
use App\Models\Mahanagar;

class MahanagarController extends Controller
{
    private $mahanagar;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MahanagarRepository $mahanagar)
    {
        $this->mahanagar = $mahanagar;
        $this->middleware('auth:api');
        $this->middleware('permission:mahanagar-list|mahanagar-create|mahanagar-edit|mahanagar-delete', ['only' => ['index','store']]);
        $this->middleware('permission:mahanagar-create', ['only' => ['create','store']]);
        $this->middleware('permission:mahanagar-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:mahanagar-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $mahanagar = $this->mahanagar->get();
        return Mahanagar::paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahanagarRequest $request)
    {
        if($request->image)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/mahanagar/').$name);

            $request->merge(['image' => $name]);
        }

        $mahanagar = $this->mahanagar->create($request->except(['id']));

        if ($mahanagar) {
            return ['success' => 'Mahanagar created Successfully'];
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
    public function update(MahanagarRequest $request, $id)
    {
        $data = $this->mahanagar->find($id);

        $currentImage = $data->image;

        if($request->image !== $currentImage)
        {
            $name = time().'.'.explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->save(public_path('assets/img/mahanagar/').$name);

            $request->merge(['image' => $name]);

            $mahanagarImage = public_path('/assets/img/mahanagar/').$currentImage;

            if(file_exists($mahanagarImage))
            {
                @unlink($mahanagarImage);
            }
        }

        $mahanagar = $this->mahanagar->update($id, $request->except(['id']));
        if ($mahanagar) {
            return ['success' => 'Mahanagar updated Successfully'];
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
        $this->mahanagar->delete($id);
        return ['message' => 'Mahanagar deleted Successfully'];
    }
}
