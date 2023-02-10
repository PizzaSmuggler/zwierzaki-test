@extends('layouts.app')
@section('content')
    <div class="container">
        <div class ="row">
            <div class="col-6">
                <h1>Lista ogłoszeń</h1>
            </div>
            <div class="col-6">
                <a class="float-end" href="{{route('adverts.create')}}">
                    <button type="button" class="btn btn-primary">Dodaj</button>
                </a>
            </div>
        </div>
        <div class ="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Płeć</th>
                    <th scope="col">Wiek</th>
                    <th scope="col">Zaszczepiony</th>
                    <th scope="col">Wysterylizowany</th>
                    <th scope="col">Waga(kg)</th>
                    <th scope="col">Wzrost(cm)</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($adverts as $advert)
                <tr>
                    <th scope="row">{{$advert->id}}</th>
                    <td>{{$advert->name}}</td>
                    <td>{{$advert->description}}</td>
                    <td>{{$advert->gender}}</td>
                    <td>{{$advert->age}}</td>
                    <td>{{$advert->vaccinated}}</td>
                    <td>{{$advert->sterilized}}</td>
                    <td>{{$advert->weight}}</td>
                    <td>{{$advert->height}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{$advert->id}}"> X </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$adverts->links()}}
        </div>
    </div>
@endsection
@section('Javascript')
    @vite(['resources/js/delete.js'])
@endsection

