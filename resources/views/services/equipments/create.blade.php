{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <div class="container p-5" style="margin:auto;">
        <h1 class="m-5">Add a new equipment</h1>
        <form action="{{ route('equipements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
           <div class="col-md-6">
               <div class="form-group">
                <label for="description">Description</label>
                <input type="text"  value="{{old("description")}}"  class="form-control @error("description") border-danger @enderror" name="description" id="description">
                @error("description")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" value="{{old("designation")}}" class="form-control @error("designation") border-danger @enderror" name="designation" id="designation">
                @error("designation")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" value="{{old("reference")}}" class="form-control @error("reference") border-danger @enderror" name="reference" id="reference">
                @error("reference")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="date">Start date</label>
                <input type="date" value="{{old("date")}}" class="form-control  @error("date") border-danger @enderror" name="date" id="date">
                @error("date")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
           </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prix">Price</label>
                    <input type="text" value="{{old("prix")}}" class="form-control  @error("prix") border-danger @enderror" name="prix" id="prix">
                    @error("prix")
                    <p style="color:red;">
                        {{$message}}
                    </p>
                    @enderror
                </div>
            <div class="form-group">
                <label for="marque">Brand</label>
                <input type="text" value="{{old("marque")}}" class="form-control  @error("marque") border-danger @enderror" name="marque" id="marque">
                @error("marque")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text"  value="{{old("category")}}"  class="form-control  @error("category") border-danger @enderror" name="category" id="category">

{{--                <select class="form-control" value="{{old("category")}}"  @error("category") border-danger @enderror" name="category" id="category">--}}
{{--                    <option value="none" selected disabled hidden>Selecter un category</option>--}}
{{--                    @foreach ($categories as $cat)--}}
{{--                        <option value={{ $cat->id }}>{{ $cat->categorie }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
                @error("category")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
           {{-- <div class="form-group">
                <label for="service">Service</label>
                <select class="form-control   @error("service") border-danger @enderror" name="service" id="caservice">
                    <option value="none" selected disabled hidden>Select a service</option>
                    @foreach ($services as $service)
                        <option value={{ $service->id }}>{{ $service->nom_service }}</option>
                    @endforeach
                </select>
                @error("service")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>--}}
           {{-- <div class="form-group">
                <label for="doc">Document(s)</label>
                <small style="color:yellow">Optional field</small>
                <input type="file"   class="form-control @error("doc") border-danger @enderror" name="doc" id="doc">
                @error("sous_famille_id")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>--}}
            <div class="form-group">
                <label for="img">Image(s)</label>
                <input type="file"   class="form-control @error("image") border-danger @enderror" name="image" id="image">
                @error("image")
                <p style="color:red;">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" name="piece_rechange" value="0">
                <input type="checkbox" name="piece_rechange" id="piece_rechange" value="1">
                <label for="piece_rechange">is a spare part : </label>
            </div>
</div>
            <button type="submit" class="btn btn-primary m-2">+ Add a piece of equipment</button>
        </div></form>
    </div>
@endsection

@section('title', 'Add Equipment ')
