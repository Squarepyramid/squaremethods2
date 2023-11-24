
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Update Department</h1>
<div class="container mt-5 p-5" style="">
<form action={{route('etablissements.update',$id)}} method="POST">
@csrf
 {{ method_field('PUT') }}

    <div class="form-group">
      <label for="raison">Company name</label>
      <input type="text" class="form-control" name="raison-social" value="{{$etab->raison_social}}"  id="raison" aria-describedby="emailHelp" placeholder="(Company name)">
    </div>
    <div class="form-group">
      <label for="adresse">Adresse</label>
      <input type="text" class="form-control" value="{{$etab->adresse}}" name="adresse" id="adresse" placeholder="(Hay Saada ....)">
    </div>
    <div class="form-group">
      <label for="tele">Telephone</label>
      <input type="text" class="form-control" value="{{$etab->telephone}}" name="tele" id="tele" placeholder="+212......">
    </div>
    <div class="form-group">
      <label for="responsable">Responsible</label>
      <input type="text" class="form-control" value="{{$etab->responsable}}" name="responsable" id="responsable" placeholder="Phone Number">
    </div>
    <button type="submit" class="btn btn-warning mt-3"><i class="fa-solid fa-pen-to-square"></i>update</button>
  </form>
</div>
@endsection

@section('title','establishments')


