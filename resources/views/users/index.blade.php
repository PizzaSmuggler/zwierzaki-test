@extends('layouts.app')
@section('content')
    <div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">E-mail</th>
            <th scope="col">Imię</th>
            <th scope="col">Telefon</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>
                <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}"> X </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        {{$users->links()}}
    </div>
@endsection
@section('Javascript')
    @vite(['resources/js/delete.js'])
@endsection

