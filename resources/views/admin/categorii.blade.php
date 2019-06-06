@extends('layouts.admin')

@section('content')

@if(Session::has('success'))
    <div class="row">
        <div class="col-12">
            <span class="alert alert-success">{{ Session::pull('success') }}</span>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-12">
        @if(Session::has('error'))
            <span class="alert alert-danger">{{ Session::pull('error') }}</span>
        @endif
    </div>
</div>

<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <table class="table  mx-auto">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Categorie</th> 
                <th></th>     
                </tr>
            </thead>
            <tbody>
                @foreach($categorii as $categorie)
                <tr>
                <th>{{$categorie->id}}</th>
                <td>{{$categorie->nume_categorie}}</td>
                <td>
                <div class="table-data-feature">
                    <button class="delcat" data-toggle="tooltip" data-id="{{$categorie->id}}" data-token="{{ csrf_token() }}" data-placement="top" title="Sterge">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </div>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <form action="/categorii" method="post">
            @csrf
                <div class="form-group text-center">
                    <label for="formGroupExampleInput"><b>Adauga categorie</b></label>
                    <input type="text" class="form-control" name="categorie" placeholder="categorie">
                </div>
                <div class="form-group text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Salveaza</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection