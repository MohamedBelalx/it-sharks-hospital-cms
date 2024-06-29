@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show Visits</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Visit Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Nurse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                        <tr>
                            <td>{{$visit->time}}</td>
                            <td>{{$visit->patient}}</td>
                            <td>{{$visit->doctor}}</td>
                            <td>{{$visit->nurse}}</td>
                            <td>
                                <a href="{{route('visit.edit',$visit->id)}}" class="text-decoration-none"> <i class="fa-solid fa-pen mr-3"></i>
                                </a>
                                <a href="{{route('visit.destroy',$visit->id)}}" class="text-decoration-none"> <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection