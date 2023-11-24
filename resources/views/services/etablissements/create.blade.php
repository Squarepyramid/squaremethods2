
{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Add Department</h1>
<div class="container mt-5 p-5" style="">
<form action="{{route('etablissements.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="form-group">
      <label for="raison">Department name</label>
      <input type="text" class="form-control" name="raison-social" id="raison" aria-describedby="emailHelp" placeholder="(Department name)">
    </div>
    <div class="form-group">
      <label for="adresse">Address</label>
      <input type="text" class="form-control" name="adresse" id="adresse" placeholder="(Hay Saada ....)">
    </div>
    <div class="form-group">
      <label for="tele">Telephone</label>
      <input type="text" class="form-control" name="tele" id="tele" placeholder="+212......">
    </div>
    <div class="form-group">
      <label for="responsable">Responsible</label>
      <input type="text" class="form-control" name="responsable" id="responsable" placeholder="Phone Number">
    </div>
    <button type="submit" class="btn btn-primary mt-3">+ Add a Department</button>
  </form>
</div>
@endsection
@section('title','establishments')
