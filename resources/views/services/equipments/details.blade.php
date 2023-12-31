
{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')

    @vite([ 'resources/js/equipment.js'])
<div class="container details" id="details">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="{{url("uploads/equipements_imgs/$equipment->image")}}" alt="...">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0">{{$equipment->designation}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">Description</h2>
                    </div>
                    <p>
                        {{$equipment->description}}
                    </p>
                </div>
                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">INFOS</h2>
                    </div>
                    <div class="row mt-n4">
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-bookmark-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Docs</h3>
                                    <p class="mb-0">University of defgtion, fecat complete ME of synage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-pencil-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Category</h3>
                                    <p class="mb-0">xxx</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-medall-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Service</h3>
                                    <p class="mb-0">xxx</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">Procedures</h2>
                        <div id="app">

                            <equipmentsop cover_data="{{$cover}}" form_url="{{route('equipements.procedure')}}"
                                          equipment_id="{{$equipment->id}}" my_cover="{{$cover_}}" view="{{asset('presenter')}}"/>
                        </div>
                    </div>
<!--                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-flex bd-highlight">
                                <div class="p-2  bd-highlight">Flex item</div>
                                <div class="p-2 flex-grow-1 bd-highlight"  style="text-align: right">
                                    <div class="btn-group ml-auto" role="group" aria-label="Basic outlined example"> &lt;!&ndash; Apply 'ml-auto' to the btn-group &ndash;&gt;
                                        <button type="button" class="btn btn-outline-warning"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-outline-danger"><i class="fa fa-times"></i> </button>
                                        <button type="button" class="btn btn-outline-primary"><i class="fa fa-eye"></i></button>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <form>
                        <select class="form-select" multiple aria-label="multiple select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-3">Add Procedure</button>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
