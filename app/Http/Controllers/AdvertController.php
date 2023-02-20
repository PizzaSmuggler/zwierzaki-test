<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageAdvertRequest;
use App\Models\Advert;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;
use App\Models\Voievodeship;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('adverts.index', [
            'adverts' => Advert::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("adverts.create",[
            'species' => Species::all(),
            'breeds' => Breed::all(),
            'voievodeships' => Voievodeship::all(),
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ManageAdvertRequest  $request
     * @return RedirectResponse
     */
    public function store(ManageAdvertRequest $request): RedirectResponse
    {
        $advert = new Advert($request->validated());
        if($request->hasFile('image')){
            $advert->image_path = Storage::disk('public')->putFile('adverts', $request->file('image'));
        }
        $advert->save();
        return redirect(route('adverts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Advert $advert
     * @return View
     */
    public function show(Advert $advert): View
    {
        return view('adverts.show', [
        'advert' => $advert
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advert $advert
     * @return View
     */
    public function edit(Advert $advert): View
    {
        return view('adverts.edit', [
            'advert' => $advert,
            'species' => Species::all(),
            'breeds' => Breed::all(),
            'voievodeships' => Voievodeship::all(),
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManageAdvertRequest $request
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function update(ManageAdvertRequest $request, Advert $advert): RedirectResponse
    {
        $advert->fill($request->validated());
        if($request->hasFile('image')){
            $advert->image_path = Storage::disk('public')->putFile('adverts', $request->file('image'));
        }
        $advert->save();
        return redirect(route('adverts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advert $advert
     * @return JsonResponse
     */
    public function destroy(Advert $advert): JsonResponse
    {
        try {
            $advert->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd'
            ])->setStatusCode(500);
        }
    }

}
