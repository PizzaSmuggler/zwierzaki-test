@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('advert.advert.show_title')}}</div>

                    <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control" name="name" value="{{ $advert->name }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.description')}}</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control" name="description" disabled>{{$advert->description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.gender')}}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="sir" value="Męska" disabled <?php echo ($advert->gender=='Męska')?'checked':'' ?>>
                                        <label class="form-check-label" for="sir">Męska</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="lady" value="Żeńska" disabled <?php echo ($advert->gender=='Żeńska')?'checked':'' ?>>
                                        <label class="form-check-label" for="lady">Żeńska</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.wiek')}}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" max="99" class="form-control" name="age" value="{{ $advert->age }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="vaccinated" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.vaccinated')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinated" id="yes" value="Tak" disabled <?php echo ($advert->vaccinated=='Tak')?'checked':'' ?>>
                                        <label class="form-check-label" for="yes">Tak</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinated" id="no" value="Nie" disabled <?php echo ($advert->vaccinated=='Nie')?'checked':'' ?>>
                                        <label class="form-check-label" for="no">Nie</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sterilized" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.sterilized')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sterilized" id="yes" value="Tak" disabled <?php echo ($advert->sterilized=='Tak')?'checked':'' ?>>
                                        <label class="form-check-label" for="yes">Tak</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sterilized" id="no" value="Nie" disabled <?php echo ($advert->sterilized=='Nie')?'checked':'' ?>>
                                        <label class="form-check-label" for="no">Nie</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="weight" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.weight')}}</label>
                                <div class="col-md-6">
                                    <input id="weight" type="number" max="100" class="form-control" name="weight" value="{{ $advert->weight }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="height" class="col-md-4 col-form-label text-md-end">{{__('advert.advert.fields.height')}}</label>

                                <div class="col-md-6">
                                    <input id="height" type="number" max="200" class="form-control" name="height" value="{{ $advert->height }}" disabled>
                                </div>
                            </div>

                        <div class="row mb-3 form-control ">
                            <div class="col-md-6">
                                <img src="{{asset('storage/' . $advert->image_path)}}" alt="Zdjęcie ogłoszenia" flex>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
