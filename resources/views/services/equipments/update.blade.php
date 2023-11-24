

{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Modify equipment</h1>
<div class="container-fluid mt-5 p-5" >

    {{-- @php dd($equipement) @endphp --}}
    <form action="{{ route('equipements.update',$equipement->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
<div class="row">
       <div class="col-md-6">
           <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" value="{{$equipement->description}}" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" value="{{$equipement->designation}}" name="designation" id="designation">
        </div>
        <div class="form-group">
            <label for="reference">Reference</label>
            <input type="text" class="form-control" value="{{$equipement->designation}}"  name="reference" id="reference">
        </div>
        <div class="form-group">
            <label for="date">Start date</label>
            <input type="date" class="form-control" value="{{$equipement->date_debut}}" name="date" id="date">
        </div>
        <div class="form-group">
            <label for="prix">Price</label>
            <input type="text" class="form-control" value="{{$equipement->prix}}" name="prix" id="prix">
        </div></div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control" value="{{$equipement->marque}}" name="marque" id="marque">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option value="none" selected disabled hidden>Select a category</option>
                @foreach ($categories as $cat)
                    <option value={{ $cat->id }} @if($cat->id === $equipement->categorie_id ) selected @endif>{{ $cat->categorie }}</option>
                @endforeach
            </select>
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="service">Service</label>--}}
{{--            <select class="form-control" name="service" id="caservice">--}}
{{--                <option value="none" selected disabled hidden>Select a service</option>--}}
{{--                @foreach ($services as $service)--}}
{{--                    <option value={{ $service->id }} @if($service->id === $equipement->service_id) selected @endif>{{ $service->nom_service }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="doc">Document(s)</label>--}}
{{--            <input type="file" class="form-control" name="doc" id="doc">--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="img">Image(s)</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <input type="hidden" name="piece_rechange" value="0">
            <input type="checkbox" name="piece_rechange" id="piece_rechange" value="1" @if($equipement->piece_de_rechange === 1) checked @endif>
            <label for="piece_rechange">is a spare part : </label>
        </div>
</div>
        <button type="submit" class="btn btn-primary m-2"> Modify </button>
    </div></form>
</div>
@endsection

@section('title','As well')


