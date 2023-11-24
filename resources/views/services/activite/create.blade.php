{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <h1 class="m-5">Add a New Activity</h1>
    <div class="container mt-5 p-5" style="">
        <form action="{{ route('activites.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control @error('description') border-danger @enderror"
                    name="description"
                    id="description">
                @error('description')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror

            </div>
            <div class="form-group">
                <label for="date">Start Date</label>
                <input type="date" class="form-control @error('date') border-danger @enderror" name="date"
                    id="date">
                @error('date')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Time</label>
                <input type="time" class="form-control @error("duree") border-danger @enderror" name="duree" id="duree">
                @error('duree')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Technician</label><br>
                <small style="color:orange">(If you can't find the technician you want here, add them to the technician list first)</small>
                <select name="technicien_id" class="form-control @error("description") border-danger @enderror">
                    <option value="none" selected disabled hidden>Assign a technician to this activity</option>
                    @foreach($techniciens as $technicien)
                    <option value="{{$technicien->id}}">{{$technicien->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Task</label>
                <select name="tache_id" class="form-control @error("description") border-danger @enderror">
                    <option value="none" selected disabled hidden>Choosing a task</option>
                    @foreach($taches as $tache)
                    <option value="{{$tache->id}}">{{$tache->description}}</option>
                    @endforeach
                </select>
                @error('tache_id')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Department</label>
                <select name="service_id" class="form-control @error("service_id") border-danger @enderror">
                    <option value="none" selected disabled hidden>Choosing a Department</option>
                    @foreach($services as $tache)
                        <option value="{{$tache->id}}">{{$tache->raison_social}}</option>
                    @endforeach
                </select>
                @error('service_id')
                <p style="color:red;">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">+ Add an activity</button>
        </form>
    </div>
@endsection

@section('title', 'Add a stain')
