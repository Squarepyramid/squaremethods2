@extends('layouts.user.index')

@section('content')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <div id="app">
       <sop  get_uploads="{{route('get_upload')}}" upload_url="{{route('upload')}}" sop_url="{{route('procedure_create')}}"/>
    </div>
@endsection

