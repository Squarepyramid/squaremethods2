{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
@php use Illuminate\Support\Facades\DB;@endphp
@if (session()->has('success'))
<div class="container"><div class="alert alert-success mt-5 ml-5" role="alert">
    {{ session()->get('success') }}
</div></div>
@endif
<div class="content-wrapper">

<section class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Here are the activities available : </h1>
           <a href="{{ route('activites.create') }}" style="margin:auto;">
            <button class="btn btn-warning m-5">
            + Add an activity
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activities</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
<div class="card">
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Description</th>
          <th>Task</th>
          <th>Start Date</th>
          <th>Time</th>
          <th>States</th>
          <th>Contact Information for Technician(s)</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activites as $activite)
         <tr>
          <td>{{$activite->id}}</td>
          <td>{{$activite->description}}</td>
          <td>{{$activite->task->description}}</td>
          <td>{{$activite->date}}</td>
          <td>{{$activite->duree}}</td>
          <td>
            @if($activite->task->etat->etat == "Not yet")
           <span style="background:rgba(255,0,0,0.1);border-radius:24px;:120px;color:red;padding:4px;">{{$activite->task->etat->etat}}</span>
            @elseif($activite->task->etat->etat == "in progress")
            <span style="background:rgba(255,255,0,0.2);border-radius:24px;:120px;color:orange;padding:4px;">{{$activite->task->etat->etat}}</span>
            @elseif($activite->task->etat->etat == "finished")
            <span style="background:rgba(0,255,0,0.1);border-radius:24px;:120px;color:green;padding:4px;">{{$activite->task->etat->etat}}</span>
            @endif
        </td>
        @php
        $user = $activite->technicien->user
        @endphp
        <td>
            <img src="{{"/uploads/techniciens_imgs/$user->image"}}" class="img-circle elevation-2"
            style="width:45px !important;height:45px !important;" alt="User Image">  <b>{{$user->name}}</b> <br>
        Téle : {{$activite->telephone}}  <br>
        E-Mail : {{$user->email}}
        </td>
          <td>
           <a href="{{ route('activities.edit',$activite->id) }}"><button class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></button></a>
           <form onsubmit="confirm('Are you sure you want to delete this item')" action="{{ route('activites.destroy',$activite->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button
            class="btn btn-danger mb-2"
            wire:click.prevent = 'deleteConfirmation({{$activite->id}})'
            ><i class="fa-solid fa-trash"></i></button>
         </form> </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
</div>

</section>

</div>
@endsection

@section('title','activities')
