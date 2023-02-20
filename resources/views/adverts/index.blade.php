@extends('layouts.app')
@section('content')
    <div class="container">
        <div class ="row">
            <div class="col-6">
                <h1>{{__('advert.advert.index_title')}}</h1>
            </div>
            <div class="col-6">
                <a class="float-end" href="{{route('adverts.create')}}">
                    <button type="button" class="btn btn-primary">{{__('advert.button.add')}}</button>
                </a>
            </div>
        </div>
        <div class ="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('advert.advert.fields.name')}}</th>
                    <th scope="col">{{__('advert.advert.fields.description')}}</th>
                    <th scope="col">{{__('advert.advert.fields.gender')}}</th>
                    <th scope="col">{{__('advert.advert.fields.age')}}</th>
                    <th scope="col">{{__('advert.advert.fields.vaccinated')}}</th>
                    <th scope="col">{{__('advert.advert.fields.sterilized')}}</th>
                    <th scope="col">{{__('advert.advert.fields.weight')}}</th>
                    <th scope="col">{{__('advert.advert.fields.height')}}</th>
                    <th scope="col">{{__('advert.advert.fields.species')}}</th>
                    <th scope="col">{{__('advert.advert.fields.breed')}}</th>
                    <th scope="col">{{__('advert.advert.fields.voievodeship')}}</th>
                    <th scope="col">{{__('advert.advert.fields.city')}}</th>
                    <th scope="col">{{__('advert.columns.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($adverts as $advert)
                    @if($advert->user_id == Auth::id())
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
                    <td>@if(!is_null($advert->species)){{$advert->species->name}}@endif</td>
                    <td>@if(!is_null($advert->breed)){{$advert->breed->name}}@endif</td>
                    <td>@if(!is_null($advert->voievodeship)){{$advert->voievodeship->name}}@endif</td>
                    <td>@if(!is_null($advert->city)){{$advert->city->name}}@endif</td>
                    <td>
                        <a href="{{route('adverts.show',$advert->id)}}">
                            <button class="btn btn-primary btn-sm"> P </button>
                        </a>
                        <a href="{{route('adverts.edit',$advert->id)}}">
                            <button class="btn btn-success btn-sm"> E </button>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="{{$advert->id}}"> X </button>
                    </td>
                </tr>
                        @elseif(Auth::user()->role =='admin')
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
                            <td>@if(!is_null($advert->species)){{$advert->species->name}}@endif</td>
                            <td>@if(!is_null($advert->breed)){{$advert->breed->name}}@endif</td>
                            <td>@if(!is_null($advert->voievodeship)){{$advert->voievodeship->name}}@endif</td>
                            <td>@if(!is_null($advert->city)){{$advert->city->name}}@endif</td>
                            <td>
                                <a href="{{route('adverts.show',$advert->id)}}">
                                    <button class="btn btn-primary btn-sm"> P </button>
                                </a>
                                <a href="{{route('adverts.edit',$advert->id)}}">
                                    <button class="btn btn-success btn-sm"> E </button>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="{{$advert->id}}"> X </button>
                            </td>
                        </tr>
                @endif
                @endforeach
                </tbody>
            </table>
            {{$adverts->links()}}
        </div>
    </div>
@endsection
@section('Javascript')
    @vite(['resources/js/deleteAd.js'])
@endsection

