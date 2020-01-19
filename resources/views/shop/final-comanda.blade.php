@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="jumbotron">
            <h4 class="text-muted" style="text-align: center">Produsele au fost comandate cu succes! </h4>
            <h4 class="text-muted" style="text-align: center">Numarul comenzii dumneavoastra este #{{$last_id}} </h4>
            <p class="text-muted" style="text-align: center">Un email de confirmare a fost trimis catre dumneavoastra </p>
        </div>
    </div>

@endsection