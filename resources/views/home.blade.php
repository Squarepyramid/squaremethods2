@extends('layouts.app')

@section('content')
    @php


    @endphp


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Technician's Area
                            {{-- {{ Auth::user()->id }} --}}
                        </h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Welcome {{ Auth::user()->name }}!</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Details</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activites as $act)
                            <tr>
                                <td>{{ $act->description }}</td>
                                <td>{{ $act->date }}</td>
                                <td>{{ $act->duree }}</td>
                                <td><a href="{{ route('activite.details', $act->technicien_id) }}">View Details</a></td>
                        @endforeach



                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
