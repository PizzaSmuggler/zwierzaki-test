<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Breed;
use App\Models\Species;
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
     * @return View
     */
    public function index(): View
    {
        return view('welcome', [
            'adverts' => Advert::paginate(10),
            'species' => Species::all(),
            'breeds' => Breed::all()
        ]);
    }
}
