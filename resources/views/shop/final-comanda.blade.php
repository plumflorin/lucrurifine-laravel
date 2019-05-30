@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <h4>Produsele au fost comandate cu succes! </h4>
            <h4>numarul comenzii dumneavoastra este #{{$last_id}} </h4>
        </div>
    </div>

@endsection