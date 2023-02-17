<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Breed;
use App\Models\Species;
use App\Models\Voievodeship;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->query('filter');
        $paginate = $request->query('paginate') ?? 5;
        $query = Advert::query();
        $query->paginate($paginate);

        if(!is_null($filters)){
            if(!is_null($filters['name'])) {
                $query = $query->where('name', $filters['name']);
            }
            if(!is_null($filters['age_min'])) {
                $query = $query->where('age', '>=', $filters['age_min']);
            }
            if(!is_null($filters['age_max'])) {
                $query = $query->where('age', '<=', $filters['age_max']);
            }
            return response()->json([
                'data' => $query->get()
            ]);
        }
        return view('welcome', [
            'adverts' => $query->get(),
            'species' => Species::all(),
            'breeds' => Breed::all(),
            'cities' => City::all(),
            'voievodeships' => Voievodeship::all()
        ]);
    }
}
