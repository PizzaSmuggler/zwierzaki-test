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
        $paginate = $request->query('paginate') ?? 1000;
        $query = Advert::query();

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
            if(!is_null($filters['species'])) {
                $query = $query->whereHas('species.breed',function ($quera) use ($filters){
                    $quera->where('species_id',$filters['species']);
                });
            }
            if(!is_null($filters['breed_id'])) {
                $query = $query->whereHas('breed',function ($quera) use ($filters){
                    $quera->where('breed_id',$filters['breed_id']);
                });
            }
            if(!is_null($filters['voievodeship'])) {
                $query = $query->whereHas('voievodeship.city',function ($quera) use ($filters){
                    $quera->where('voievodeship_id',$filters['voievodeship']);
                });
            }
            if(!is_null($filters['city_id'])) {
                $query = $query->whereHas('breed',function ($quera) use ($filters){
                    $quera->where('city_id',$filters['city_id']);
                });
            }
            if(!is_null($filters['gender'])) {
                $query = $query->where('gender', '=', $filters['gender']);
            }
            return response()->json($query->paginate($paginate));
        }
        return view('welcome', [
            'adverts' => $query->paginate($paginate),
            'species' => Species::all(),
            'breeds' => Breed::all(),
            'cities' => City::all(),
            'voievodeships' => Voievodeship::all()
        ]);
    }
}
