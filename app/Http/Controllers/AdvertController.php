<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            'adverts' => Advert::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("adverts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $advert = new Advert($request->all());
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
            'advert' => $advert
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function update(Request $request, Advert $advert): RedirectResponse
    {
        $advert->fill($request->all());
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
