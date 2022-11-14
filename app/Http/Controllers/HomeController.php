<?php

namespace App\Http\Controllers;

use App\Models\PlantingLocation;

class HomeController extends Controller
{
    
  public function index(){

    $planting_locations = PlantingLocation::get();

    return view('home_page', compact('planting_locations'));

  }

}
