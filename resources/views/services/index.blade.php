@extends('layouts.user.index')

@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid m-4">
                <h1><i class="fa-solid fa-chart-line"></i> Dashboard</h1>
                <!-- Small boxes (Stat box) -->
                <div class="row m-4">
                    <div class="col-md-6 col-sm-12 mt-3">
                        <!-- small box -->
                        <div class="card bg-info">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-screwdriver-wrench"></i> Equipment</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $Count_Equipement }}</h6>
                            </div>
                            <div class="card-icon">

                            </div>
                            <div class="card-footer">
                                <i class="fa-solid fa-screwdriver-wrench"></i> <a href="{{ route('equipements.index') }}" class="card-link">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-6  col-sm-12 mt-3">
                        <!-- small box -->
                        <div class="card bg-success">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-list-check"></i> Task</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $Count_Taches }}</h6>
                            </div>
                            <div class="card-icon">

                            </div>
                            <div class="card-footer">
                                <i class="fa-solid fa-list-check"></i>  <a href="{{ route('taches.index') }}" class="card-link">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-4">

                    <div class="col-md-6  col-sm-12 mt-3">
                        <!-- small box -->
                        <div class="card bg-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-building"></i> Establishment</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $Count_Etablissement }}</h6>
                            </div>
                            <div class="card-icon">

                            </div>
                            <div class="card-footer">
                                <i class="fa-solid fa-building"></i> <a href="{{ route('etablissements.index') }}" class="card-link">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-6  col-sm-12 mt-3">
                        <!-- small box -->
                        <div class="card bg-danger">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-toolbox"></i> Technicians</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $Count_Techniciens }}</h6>
                            </div>
                            <div class="card-icon">
                            </div>
                            <div class="card-footer">
                                <i class="fa-solid fa-toolbox"></i>
                                <a href="{{ route('techniciens.index') }}" class="card-link">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </div>

@endsection


@section('title', 'services')
