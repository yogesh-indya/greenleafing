<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Input;
use Event;
use App\User;
use App\Plant;
use App\Picture;
use App\Http\Requests;
use App\Events\SomeEvent;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\NewPlantRequest;


class PlantController extends Controller
{

        /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NewPlantRequest $request)
    {

      $plant = new Plant;

      $data = $request->all();

            $plant->plant_name = $data['plant_name'];
            $plant->planted_date = $data['planted_date'];
            $plant->user_id = Auth::guard('api')->user()->id;
            $plant->height = $data['height'];
            $plant->update_frequency = $data['update_frequency'];
            $plant->long = $data['long'];
            $plant->lat = $data['lat'];
            $plant->description = $data['description'];

            $plant->save();

            if($request->hasFile('images')){

              $files = $request->file('images');

                foreach ($files as $file){

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture = date('His').$filename;
                    $destinationPath = base_path() . '\public\images';
                    $file->move($destinationPath, $picture);

                    $picture = new Picture;
                    $picture->filePath = $destinationPath;
                    $picture->plant_id = $plant->id;
                    $picture->save();

                  }
            }

            return Response::json([
              'status' => 'success',
              'plant_info' => $plant>toArray(),
              'plant_pictures' => $plant->pictures()->get()->toArray()
            ],200);

    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plant = Plant::find($id);

        if($plant){
          return Response::json([
            'status' => 'success',
            'plant_info' => $plant->toArray(),
            'plant_pictures' => $plant->pictures()->get()->toArray()
          ],200);
        }
          return Response::json([
            'status' => 'fail',
            'message' => 'No plants found with given ID'
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {

      $plant = Plant::find($id);

      if (Gate::denies('update-plant', $plant)) {
        return Response::json([
          'status' => 'fail',
          'message' => 'User unauthorized to edit this plant'
        ],200);
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
        //
    }
}
