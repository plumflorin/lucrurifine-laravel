@extends('layouts.admin')

@section('content')


<!-- PAGE CONTAINER-->
<div class="container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                @foreach ($comanda->produse as $produs)
                    <div class="col-md-4">
                        <div class="card" style="max-width: 10em">
                            <img class="card-img-top" src="/storage/images/{{ $produs->imagini[0]->folder_imagine }}/{{$produs->imagini[0]->nume_imagine}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">{{$produs['nume_produs']}}</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Marime: {{$produs->pivot->marime}}
                                </li>                                            
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Cantitate: {{$produs->pivot->cantitate}}
                                </li>                                            
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Pret: {{$produs->pivot->pret}}
                                </li>                                            
                            </ul>
                        </div>
                    </div>
                    @endforeach                
                </div>
            </div>
        </div>
    </div>
</div>


@endsection