
@extends('layouts.user.index')
{{--@extends('layouts.services-layout')--}}


@section('content')
    <h1 class="m-5">Edit this Technician</h1>
<div class="container mt-5 p-5" style="">

<form action="{{route('techniciens.update',$id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group">
      <label for="tele">Telephone Number</label>
      <input type="text" class="form-control" value="{{$techniciens->telephone}}" name="tele" id="tele" >
    </div>

    <div class="form-group">
      <label for="user_id">User </label>
<input type="text"  class="form-control"  value="{{$techniciens->name}}" disabled>
    </div>
    <div class="form-group mt-3">
      <label for="specialites">Specialty</label>
      <select  name="specialites" id="specialites">
        @foreach($specialites as $specialite)
        <option value={{$specialite->id}}>{{$specialite->specialite}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="image">Image</label><br>
      <small style="color:yellow">[Optional field]</small>

      <input type="file" class="form-control" name="image" id="image" >
    </div>


    <button type="submit" class="btn btn-primary mt-3"> Update</button>
  </form>
</div>
@endsection

@section('title','ajouter un technicien')


