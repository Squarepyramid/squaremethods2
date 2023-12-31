@extends('layouts.user.index')

@section('content')

<div class="content-wrapper">

<section class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Here are the equipments : </h1>
           <a href="{{ route('equipements.create') }}" style="margin:auto;">
            <button class="btn btn-warning m-5">
            + Add a new equipment
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/services">Home</a></li>
              <li class="breadcrumb-item active">equipment </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid m-3">
      <div class="row">
         @foreach($equipments as $equipment)
        <div class="col col-sm-12 col-md-6">
{{-- <h1>{{print_r($equipments)}}</h1> --}}

<div class="card p-3" style="width:20rem;">
  <img class="card-img-top" src={{url('uploads/equipements_imgs/'.$equipment->image)}} width="300px" height="300px" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$equipment->designation}}</h5>
    <p class="card-text line-clamp">{{$equipment->description}}</p>
    <div  style="display:flex;">
    <a href={{route("equipements.details",$equipment->id)}} class="btn btn-small btn-primary">Details</a>
    <a href="{{ route('equipements.edit',$equipment->id)}}"><button class="btn btn-warning mr-3 ml-3"><i class="fa-solid fa-pen-to-square"></i></button></a>
    <form onsubmit="confirm('êtes-vous sûr de vouloir supprimer cet élément')" action="{{ route('equipements.destroy',$equipment->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
    </form>
</div>
  </div>
</div>


</div>
   @endforeach
</div>
</div>

</section>

</div>

@endsection




@section('title','equipements')
