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
            <h1>Here are the available Tasks : </h1>
           <a href="{{ route('taches.create') }}" style="margin:auto;">
            <button class="btn btn-warning m-5">
                + Add a Task
            </button>
           </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/services">Home</a></li>
              <li class="breadcrumb-item active">Task </li>
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
      <h3 class="card-title">Task</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Description</th>
          <th>Date</th>
          <th>Duration</th>
            <th>Equipment</th>
          <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($taches as $tache)
         <tr>
<td>{{$tache->id}}</td>
<td>{{$tache->description}}</td>
<td>{{$tache->date}}</td>
<td>{{$tache->duree}}</td>
             <td>{{$tache->equipment->description}}</td>
          <td style="display:flex;">
           <a href="{{ route('taches.edit',$tache->id) }}">
            <button class="btn btn-warning mr-2"><i class="fa-solid fa-pen-to-square"></i></button></a>
              &nbsp;
             <form onsubmit="confirm('Are you sure you want to delete this item')" method="post" action="{{ route('taches.destroy', $tache->id) }}">
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-danger mb-2"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
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

@section('title','Task')
