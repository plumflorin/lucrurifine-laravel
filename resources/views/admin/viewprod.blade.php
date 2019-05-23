
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

    
        <!-- DATA TABLE -->        
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button>
            </div>
            <div class="table-data__tool-right">
                <button onclick="location.href = '/produse/create'" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add item</button>
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Denumire</th>
                        <th>Categorie</th>
                        <th>Poza</th>
                        <th>Pret</th>
                        <th>Pret vechi</th>
                        <th>Data</th>                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow">

                    @foreach ($produse as $produs)
                        
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td class="desc">{{ $produs->nume_produs }}</td>
                        <td>{{ $produs->categorii->nume_categorie }}</td>
                        <td><img style="max-height: 60px" src="storage/images/{{ $produs->imagini->first()->folder_imagine }}/{{$produs->imagini->first()->nume_imagine}}" alt=""></td>
                        <td>{{ $produs->pret_produs }}</td>
                        <td>{{ $produs->pret_vechi_produs }}</td>
                        <td>{{ $produs->created_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button>
                                <button onclick="location.href = '/produse/{{$produs->id}}/edit'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button data-id="{{ $produs->id }}" class="item del" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->

        
    </div>
</div>

@endsection