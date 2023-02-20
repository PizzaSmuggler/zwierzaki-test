@extends('layouts.app')

@section('content')
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-8 order-md-2 col-lg-9">
                    <div class="container-fluid">
                        <div class="row mb-5">
                            <div class="col-12">
                                <div class="dropdown text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                                    <label class="mr-2">Sort by:</label>
                                    <a class="btn btn-lg btn-light dropdown-toggle" data-bs-toggle='dropdown' role="button" aria-haspopup="true" aria-expanded="false">Relevance <span class="caret"></span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#">Price Descending</a>
                                        <a class="dropdown-item" href="#">Price Ascending</a>
                                        <a class="dropdown-item" href="#">Best Selling</a>
                                    </div>
                                </div>
                                <div class="dropdown float-right">
                                    <a class="btn btn-lg btn-light dropdown-toggle adverts-actual-count" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">5<span class="caret"></span></a>
                                    <div class="dropdown-menu adverts-count" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                        <a class="dropdown-item" href="#">5</a>
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">15</a>
                                        <a class="dropdown-item" href="#">20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="adverts-wrapper">
                            @foreach($adverts as $advert)
                                <div class="col-6 col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100 border-0">
                                        <div class="card-img-top">
                                            @if(!is_null($advert->image_path))
                                                <img src="{{asset('storage/' . $advert->image_path)}}" class="img-fluid mx-auto d-block" alt="Card image cap">
                                            @else
                                                <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                            @endif
                                        </div>
                                        <div class="card-body text-center">
                                            <h4 class="card-title">
                                                <a href="{{route('adverts.show',$advert->id)}}" class=" font-weight-bold text-dark text-uppercase small"> {{$advert->name}}</a>
                                            </h4>
                                            <h5 class="card-price small">
                                                <i>
                                                     {{$advert->city->name}}</i>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row sorting mb-5 mt-5">
                            <div class="col-12">
                                <a class="btn btn-light">
                                    <i class="fas fa-arrow-up mr-2"></i> Back to top</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                                    <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                                </div>
                                <div class="dropdown float-right">
                                    <a class="btn btn-lg btn-light dropdown-toggle adverts-actual-count" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">5<span class="caret"></span></a>
                                    <div class="dropdown-menu adverts-count" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                        <a class="dropdown-item" href="#">5</a>
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">15</a>
                                        <a class="dropdown-item" href="#">20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                    odtad--}}
                <form class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                    <h3 class="mt-0 mb-5 adverts-count-results">Wyświetlanie <span class="text-primary"></span>ogłoszeń</h3>
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Imię zwierzaka</h6>
                    <div class="mt-2 mb-2 pl-2">
                        <input type="text" class="custom-control-input form-control" id="name" name="filter[name]">
                    </div>
                    <hr class="hr blurry" />
                    <div>
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Typ zwierzaka</h6>
                    <div class="mt-2 mb-2 pl-2">
                        <select class="form-control" id="species" name="filter[species]">
                            <option value="">Wszystkie zwierzęta</option>
                            @foreach ($species as $species)
                                <option value="{{$species->id}}">
                                    {{$species->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="hr blurry" />
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Rasa zwierzaka</h6>
                    <div class="mt-2 mb-2 pl-2">
                        <select class="form-control" id="breeds" name="filter[breed_id]">
                            <option value="">Wybierz rasę zwierzaka</option>
                        </select>
                    </div>
                    </div>
                    <hr class="hr blurry" />
                    <div>
                        <h6 class="text-uppercase font-weight-bold mb-3 text-center">Województwo</h6>
                        <div class="mt-2 mb-2 pl-2">
                            <select class="form-control" id="voievodeships" name="filter[voievodeship]">
                                <option value="">Wszystkie województwa</option>
                                @foreach ($voievodeships as $voievodeship)
                                    <option value="{{$voievodeship->id}}">
                                        {{$voievodeship->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="hr blurry" />
                        <h6 class="text-uppercase font-weight-bold mb-3 text-center">Miasto</h6>
                        <div class="mt-2 mb-2 pl-2">
                            <select class="form-control" id="cities" name="filter[city_id]">
                                <option value="">Wybierz województwo</option>
                            </select>
                        </div>
                    </div>
                    <hr class="hr blurry" />
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Płeć</h6>
                    <div class="mt-2 mb-2 pl-2">
                        <select class="form-control" id="gender" name="filter[gender]">
                            <option value="">Bez znaczenia</option>
                                <option value="Męska">Męska</option>
                                <option value="Żeńska">Żeńska</option>
                        </select>
                    </div>
                    <hr class="hr blurry" />
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Wiek</h6>
                    <div class="price-filter-control inline-flex">
                        <input type="number" class="form-control w-50 pull-left mb-2" placeholder="0" id="age-min-control" name="filter[age_min]">
                        <input type="number" class="form-control w-50 pull-right" placeholder="30" id="age-max-control" name="filter[age_max]">
                    </div>
                    <hr class="hr blurry" />
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Waga</h6>
                    <div class="price-filter-control inline-flex">
                        <input type="number" class="form-control w-50 pull-left mb-2" placeholder="0" id="weight-min-control" name="filter[weight_min]">
                        <input type="number" class="form-control w-50 pull-right" placeholder="500" id="weight-max-control" name="filter[weight_max]">
                    </div>
                    <hr class="hr blurry" />
                    <h6 class="text-uppercase font-weight-bold mb-3 text-center">Wzrost</h6>
                    <div class="price-filter-control inline-flex">
                        <input type="number" class="form-control w-50 pull-left mb-2" placeholder="0" id="height-min-control" name="filter[height_min]">
                        <input type="number" class="form-control w-50 pull-right" placeholder="200" id="height-max-control" name="filter[height_max]">
                    </div>
                    <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">

                    <a href="#" class="btn btn-lg btn-block btn-primary mt-5" id="filter-button">Szukaj</a>
                </form>
            </div>
        </div>
@endsection
@section('Javascript')
    @vite(['resources/js/dropdownWelcome.js','resources/js/filterWelcome.js'])
@endsection

