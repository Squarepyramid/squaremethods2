@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <h3>Your Task :</h3>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Duration</th>
                  <th>State</th>
                </tr>
                </thead>
                <tbody>

                 <tr>
                    <td>{{$taches->description}}</td>
                    <td>{{$taches->date}}</td>
                    <td>{{$taches->duree}} Day</td>
                    <td>
                        @if($taches->etat->etat == "Not yet")
                        <span style="background:rgba(255,0,0,0.1);color:red;padding:4px;">{{$taches->etat->etat}}</span>
                        @elseif($taches->etat->etat == "in progress")
                        <span style="background:rgba(255,255,0,0.2);color:orange;padding:4px;">{{$taches->etat->etat}}</span>
                        @elseif($taches->etat->etat == "finished")
                        <span style="background:rgba(0,255,0,0.1);color:green;padding:4px;">{{$taches->etat->etat}}</span>
                        @endif
                    </td>

                </tbody>
              </table>

    </div>


</div>

<div class="container">
    <h2>Information</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Designation</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $equipment['designation']; ?></td>
            <td><?php echo $equipment['description']; ?></td>
            <td rowspan="2" style="text-align: right">
                <?php if (!empty($equipment['image'])): ?>
                    <img class="img-thumbnail" src="{{asset('uploads/equipements_imgs/'.$equipment['image'])}}" alt="Product Image">
                <?php else: ?>
                    No image available
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <h5>Procedures:</h5>
                @foreach($procedure as $procedure)
                    <a href="{{asset('presenter').'/'.$procedure->cover_id}}"><i class="fa fa-eye"></i> {{$procedure->cover->text}}</a>
                    <br/>
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
