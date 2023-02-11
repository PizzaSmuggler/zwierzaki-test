@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edycja ogłoszenia</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('adverts.update',$advert->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $advert->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>{{$advert->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Płeć') }}</label>

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

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">Wiek</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" max="99" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $advert->age }}" required autocomplete="name" autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="vaccinated" class="col-md-4 col-form-label text-md-end">{{ __('Szczepiony') }}</label>
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
                                <label for="sterilized" class="col-md-4 col-form-label text-md-end">{{ __('Sterylizowany') }}</label>
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

                            <div class="row mb-3">
                                <label for="weight" class="col-md-4 col-form-label text-md-end">Waga (kg)</label>
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
                                <label for="height" class="col-md-4 col-form-label text-md-end">Wysokość (cm)</label>

                                <div class="col-md-6">
                                    <input id="height" type="number" max="200" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $advert->height }}" required>

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edytuj
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
