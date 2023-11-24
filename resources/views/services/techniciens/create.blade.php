

{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Add a Technician</h1>
<div class="container mt-5 p-5" style="">
<form action="{{route('techniciens.store')}}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="form-group" @error("tele") border-danger @enderror >
      <label for="tele">Telephone Number</label>
      <input  type="text" class="form-control" name="tele" id="tele">
        @error("tele")
        <p style="color:red;">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="form-group" @error("user_id") border-danger @enderror >
      <label for="user_id">User </label>
      <select  class="form-control"   name="user_id" id="user_id">
        @foreach($users as $user)
         <option value={{$user->id}}>{{$user->name}}</option>
        @endforeach
      </select>
        @error("user_id")
        <p style="color:red;">
            {{$message}}
        </p>
        @enderror
    </div>

    <div class="form-group" @error("specialites") border-danger @enderror>
      <label for="specialites">Specialty</label>
        <input type="text" class="form-control" name="specialites" id="specialites">
{{--      <select  name="specialites" id="specialites">--}}
{{--        @foreach($specialites as $specialite)--}}
{{--         <option value={{$specialite->id}}>{{$specialite->specialite}}</option>--}}
{{--        @endforeach--}}
{{--      </select>--}}
        @error("specialites")
        <p style="color:red;">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="form-group">
      <label for="image">Image</label><br>
      <small style="">[Optional field]</small>
      <input type="file" class="form-control" name="image" id="image">
    </div>
    <button type="submit" class="btn btn-primary mt-3">+ Add</button>
  </form>
</div>
@endsection

@section('title','Add a Technician')


