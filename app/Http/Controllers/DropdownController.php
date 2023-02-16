<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\Species;
use App\Models\Voievodeship;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DropdownController extends Controller
{
    /**
     * Write code on Method
     *
     * @return \Illuminate\Contracts\View\View|Factory|Application ()
     */
    public function index(): Factory|\Illuminate\Contracts\View\View|Application
    {
        $species = Species::all();
        $voievodeships = Species::all();
        return view('demo.dependent_dropdown.index',compact('species','voievodeships'));
    }

    /**
     * Write code on Method
     *
     * @param $id
     * @return JsonResponse ()
     */
    public function getBreeds($id): JsonResponse
    {
        $breeds = Breed::where('species_id',$id)->get();
        return response()->json($breeds);
    }
    /**
     * Write code on Method
     *
     * @param $id
     * @return JsonResponse ()
     */
    public function getCities($id): JsonResponse
    {
        $cities = City::where('voievodeship_id',$id)->get();
        return response()->json($cities);
    }
}

