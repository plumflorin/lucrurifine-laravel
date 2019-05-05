@extends('layouts.admin')

@section('content')
<div class="container" style="margin-top: 20px">
  @if($errors->any())
  <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div><br />
  @endif
  <form action="/produse/{{$produs[0]->id}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Nume Produs</label> 
      <div class="col-4">
        <input id="text" name="nume" type="text" class="form-control" value="{{$produs[0]->nume_produs}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="textarea" class="col-4 col-form-label">Descriere Produs</label> 
      <div class="col-4">
        <textarea id="textarea" name="descriere" cols="40" rows="5" class="form-control">{{$produs[0]->descriere_produs}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="text1" class="col-4 col-form-label">Pret</label> 
      <div class="col-4">
        <input id="text1" name="pret" type="text" class="form-control" value="{{$produs[0]->pret_produs}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="text2" class="col-4 col-form-label">Pret vechi</label> 
      <div class="col-4">
        <input id="text2" name="pret2" type="text" class="form-control" value="{{$produs[0]->pret_vechi_produs}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="select" class="col-4 col-form-label">Categorie</label> 
      <div class="col-4">
        <select id="select" name="categorie" class="custom-select">
        @foreach ($categorii as $categorie)
            <option value="{{ $categorie->id }}" @if ($categorie->id == $produs[0]->categorii->id) selected @endif>{{ $categorie->nume_categorie }}</option>
        @endforeach
          
        </select>
      </div>
    </div> 

    <!-- <div class="form-group row">
      <label class="col-md-4 control-label" for="">Incarca poze</label>
      <div class="col-4">
        <input id="image" name="images[]" class="input-file" type="file" multiple>
      </div>
    </div> -->

    <div class="form-group row">
      <div class="offset-4 col-4">
        <button name="submit" type="submit" class="btn btn-primary">Salveaza</button>
      </div>
    </div>
  </form>
  </div>



@endsection
