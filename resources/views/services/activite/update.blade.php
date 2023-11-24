{{--@extends('layouts.services-layout');--}}
@extends('layouts.user.index')

@section('content')
    <div class="container mt-5 p-5" style="">
        <form action="{{ route('activites.update',$id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control @error('description') border-danger @enderror"
                    name="description" value="{{$activite->description}}"
                    id="description">
                @error('description')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror

            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" value="{{$activite->date}}" class="form-control @error('date') border-danger @enderror" name="date"
                    id="date">
                @error('date')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="number" value="{{$activite->duree}}" class="form-control @error("duree") border-danger @enderror" name="duree" id="duree">
                @error('duree')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">

                <label for="duree">Technicien</label><br>

                <small style="color:orange">(If you can't find the technician you want here, add them to the technician list first)</small>
                <select name="technicien_id" class="form-control @error("description") border-danger @enderror">

                    @foreach($techniciens as $tech)
                    <option value="{{$tech->id}}" @if($tech->id === $technicien->id) selected @endif>{{$tech->name}}</option>
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
                    <option value="{{$tache->id}}" @if($activite->tache_id === $tache->id) selected @endif>{{$tache->description}}</option>
                    @endforeach
                </select>
                @error('tache_id')
                    <p style="color:red;">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">State</label>
                <select name="etat_id" class="form-control @error("description") border-danger @enderror">
                    @foreach($etats as $etat)
                    <option value="{{$etat->id}}" >{{$etat->etat}}</option>
                    @endforeach
                </select>
                @error('etat_id')
                    <p style="color:red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Edit this Activities</button>
        </form>
    </div>
@endsection

@section('title', 'Add a stain')
