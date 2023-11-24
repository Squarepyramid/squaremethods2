{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
<div class="content-wrapper">

<section class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Here are available Departments:</h1>
           <a href="{{ route('etablissements.create') }}" style="margin:auto;">
            <button class="btn btn-warning m-5">
            + Add a location
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="text-align: right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
   {{--  <h1>{{$etabs}}</h1> --}}
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Company name</th>
          <th>Address</th>
          <th>Telephone</th>
          <th>Responsible</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etabs as $etab)
         <tr>
          <td>{{$etab->id}}</td>
          <td>{{$etab->raison_social}}</td>
          <td>{{$etab->adresse}}</td>
          <td>{{$etab->telephone}}</td>
          <td>{{$etab->responsable}}</td>
          <td>
           <a href="{{ route('etablissements.edit',$etab->id) }}"><button class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></button></a>
           <form onsubmit="confirm('êtes-vous sûr de vouloir supprimer cet élément')" action="{{ route('etablissements.destroy',$etab->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button
            class="btn btn-danger mb-2"
            wire:click.prevent = 'deleteConfirmation({{$etab->id}})'
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

@section('title','establishments')
