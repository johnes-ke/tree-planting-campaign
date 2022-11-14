<?php

namespace App\Http\Controllers;

use App\Models\PlantingLocation;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlantingLocationRequest;
use App\Http\Requests\UpdatePlantingLocationRequest;

class PlantingLocationController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlantingLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, array(
            'name'           => ['required'],
            'email'          => ['required'],
            'amount'         => ['required'],
            'message_content'=> ['required'],
            'planting_point' => ['required'],
        ));

        $fullname  = $request->name;
        $email     = $request->email;
        $amount    = $request->amount;
        $lat       = $request->latitude;
        $lng       = $request->longitude;
        $message   = $request->message_content;
        $plantingLocation = $request->planting_point;

        //dd($fullname,$email,$amount,$lat,$lng,$message,$plantingLocation);
        
        $voted = PlantingLocation::create(
            [
                'name'           => $fullname,
                'email'          => $email,
                'amount'         => $amount,
                'message'        => $message,
                'latitude'       => '-4.043477',
                'longitude'      => '39.668206',
                'planting_point' => $plantingLocation,
            ]);
  
        if($voted){
            alert()->success('Peace','Thank You for Helping in Planting A Tree to save lives');
        }else {
            alert()->error('Fail','Failed to Plant a tree');
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantingLocation  $PlantingLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PlantingLocation $PlantingLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantingLocation  $PlantingLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantingLocation $PlantingLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantingLocationRequest  $request
     * @param  \App\Models\PlantingLocation  $PlantingLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlantingLocationRequest $request, PlantingLocation $PlantingLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantingLocation  $PlantingLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantingLocation $PlantingLocation)
    {
        //
    }
}
