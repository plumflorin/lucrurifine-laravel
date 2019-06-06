@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="jumbotron">
            <h4 style="text-align: center">Produsele au fost comandate cu succes! </h4>
            <h4 style="text-align: center">Numarul comenzii dumneavoastra este #{{$last_id}} </h4>
        </div>
    </div>

@endsection