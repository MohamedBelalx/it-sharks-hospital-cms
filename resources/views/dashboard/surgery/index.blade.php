@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show Surgeries</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Doctor</th>
                            <th>Nurse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surgeries as $surgery)
                            
                        <tr>
                            <td>{{$surgery->name}}</td>
                            <td>{{$surgery->time}}</td>
                            <td>{{$surgery->doctor}}</td>
                            <td>{{$surgery->nurse}}</td>
                            <td>
                                <a href="{{route('surgery.edit',$surgery->id)}}" class="text-decoration-none"> <i class="fa-solid fa-pen mr-3"></i>
                                </a>
                                <a href="{{route('surgery.destroy',$surgery->id)}}" class="text-decoration-none"> <i class="fa-solid fa-trash"></i>
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