

{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Edit this task</h1>
<div class="container mt-5 p-5" style="">
<form action={{route("taches.update",$id)}} method="POST">
@csrf
{{ method_field('PUT') }}
    <label for="description">Description</label>
    <div class="form-group">
      <input type="text" class="form-control" name="description" id="description"  value="{{$tache->description}}" >
    </div>
    <div class="form-group">
      <label for="date">Date</label>
      <input type="date" class="form-control" name="date" id="date" value={{$tache->date}}>
    </div>
    <div class="form-group">
      <label for="duree">Duration</label>
      <input type="number" class="form-control" value={{$tache->duree}} name="duree" id="duree" step="0.01">
    </div>
    <div class="form-group">
        <label for="category">Equipment</label>
        <select class="form-control"   @error("equipment") border-danger @enderror" name="equipment" id="equipment">
        <option value="none" selected disabled hidden>Selecter equipment</option>
        @foreach ($equipment as $eqp)
            <option value={{ $eqp->id }}>{{ $eqp->description }}</option>
            @endforeach
            </select>
            @error("equipment")
            <p style="color:red;">
                {{$message}}
            </p>
            @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-pen-to-square"></i>Modify</button>
  </form>
</div>
@endsection

@section('title','Add a Task')


