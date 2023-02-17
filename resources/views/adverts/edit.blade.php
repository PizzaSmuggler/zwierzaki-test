@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('advert.advert.edit_title',['name'=>$advert->name])}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('adverts.update',$advert->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $advert->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.description')}}</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>{{$advert->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.gender')}}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="sir" value="Męska" <?php echo ($advert->gender=='Męska')?'checked':'' ?>>
                                        <label class="form-check-label" for="sir">Męska</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="lady" value="Żeńska" <?php echo ($advert->gender=='Żeńska')?'checked':'' ?>>
                                        <label class="form-check-label" for="lady">Żeńska</label>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.age')}}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" max="99" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $advert->age }}" required autocomplete="name" autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="vaccinated" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.vaccinated')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinated" id="yes" value="Tak" <?php echo ($advert->vaccinated=='Tak')?'checked':'' ?>>
                                        <label class="form-check-label" for="yes">Tak</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinated" id="no" value="Nie" <?php echo ($advert->vaccinated=='Nie')?'checked':'' ?>>
                                        <label class="form-check-label" for="no">Nie</label>
                                    </div>
                                    @error('vaccinated')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sterilized" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.sterilized')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sterilized" id="yes" value="Tak" <?php echo ($advert->sterilized=='Tak')?'checked':'' ?>>
                                        <label class="form-check-label" for="yes">Tak</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sterilized" id="no" value="Nie" <?php echo ($advert->sterilized=='Nie')?'checked':'' ?>>
                                        <label class="form-check-label" for="no">Nie</label>
                                    </div>
                                    @error('sterilized')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="weight" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.weight')}}</label>
                                <div class="col-md-6">
                                    <input id="weight" type="number" max="100" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $advert->weight }}" required>

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="height" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.height')}}</label>

                                <div class="col-md-6">
                                    <input id="height" type="number" max="200" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $advert->height }}" required>

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="species" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.species')}}</label>

                                <div class="col-md-6">
                                    <select id="species" class="form-control @error('species_id') is-invalid @enderror" name="species_id" required>
                                        <option value="">-- Wybierz gatunek --</option>
                                        @foreach ($species as $species)
                                            <option value="{{$species->id}}">
                                                {{$species->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('species_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="breed" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.breed')}}</label>
                                <div class="col-md-6">
                                    <select id="breeds" class="form-control @error('breed_id') is-invalid @enderror" name="breed_id" required>
                                        <option value="">-- Najpierw wybierz gatunek --</option>
                                    </select>
                                    @error('breed_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="voievodeship" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.voievodeship')}}</label>

                                <div class="col-md-6">
                                    <select id="voievodeship" class="form-control @error('voievodeship_id') is-invalid @enderror" name="voievodeship_id" required>
                                        <option value="">-- Wybierz województwo --</option>
                                        @foreach ($voievodeships as $voievodeship)
                                            <option value="{{$voievodeship->id}}">
                                                {{$voievodeship->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('voievodeship_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="city" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.city')}}</label>
                                <div class="col-md-6">
                                    <select id="cities" class="form-control @error('city_id') is-invalid @enderror" name="city_id" required>
                                        <option value="">-- Najpierw wybierz województwo --</option>
                                    </select>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="hr blurry" />
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.image')}}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file"  class="form-control @error('image') is-invalid @enderror" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 form-control ">
                                <div class="col-md-6">
                                    <img src="{{asset('storage/' . $advert->image_path)}}" alt="Zdjęcie ogłoszenia" flex>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('advert.button.edit')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Javascript')
    @vite(['resources/js/dropdown.js','resources/js/dropdowncity.js'])
@endsection
