@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col col-md-12 pr-md-5 pl-md-5">
                    <div class="bd-example bd-example-tabs">
                        <div class="tab-content pb-5" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-12 col-md-5  text-left">
                                            <h2>Mam na imię {{$advert->name}} </h2>
                                            <p class=" mt-4"> {{$advert->description}} </p>
                                            <blockquote class="card  text-left  py-3 px-4 mb-3 mt-4  ">
                                                <div class="row align-items-center justify-content-between">
                                                    <div class="col-9 position-relative">
                                                        <p class=" m-0 text-muted small">
                                                        <table class="table table-hover table-striped table-bordered" id="dev-table">
                                                            <tbody>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.gender')}}</td>
                                                                <td>{{$advert->gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.species')}}</td>
                                                                <td>{{$advert->species->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.breed')}}</td>
                                                                <td>{{$advert->breed->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.age')}}</td>
                                                                <td>{{$advert->age}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.weight')}}</td>
                                                                <td>{{$advert->weight}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.height')}}</td>
                                                                <td>{{$advert->height}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.vaccinated')}}</td>
                                                                <td>{{$advert->vaccinated}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.sterilized')}}</td>
                                                                <td>{{$advert->sterilized}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        </p>
                                                        <table class="table table-hover table-striped table-bordered" id="dev-table">
                                                            <tbody>
                                                            <tr>
                                                                <td>{{__('advert.advert.fields.voievodeship')}}</td>
                                                                <td>{{__('advert.advert.fields.city')}}</td>
                                                                <td>{{__('advert.advert.fields.phone')}}</td>

                                                            </tr>
                                                            <tr>
                                                                <td>{{$advert->voievodeship->name}}</td>
                                                                <td>{{$advert->city->name}}</td>
                                                                <td>{{$advert->user->phone}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3" aria-hidden="true"></i></div>
                                                </div>
                                            </blockquote>
                                        </div>
                                        <div class="col-12 col-md-5 mb-4 ml-md-auto">
                                            <img alt="image" class="img-fluid img-center mr-auto ml-auto d-none d-md-block" src="{{asset('storage/' . $advert->image_path)}}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
