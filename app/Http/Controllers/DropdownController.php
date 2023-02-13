<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\Species;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DropdownController extends Controller
{
    /**
     * Write code on Method
     *
     * @return \Illuminate\Contracts\View\View|Factory|Application ()
     */
    public function view(): \Illuminate\Contracts\View\View|Factory|Application
    {
        $species = DB::table('species')->get();

        return view('dropdown', compact('species'));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getBreeds(Request $request): Response
    {
        $breeds = DB::table('breeds')->where('species_id', $request->species_id)->get();
        if (count($breeds) > 0) {
            return response()->json($breeds);
        }
    }
}
