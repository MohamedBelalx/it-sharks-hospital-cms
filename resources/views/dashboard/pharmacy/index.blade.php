@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show Pharmacy</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Treatment</th>
                            <th>visit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pharmacies as $pharmacy)
                            
                        <tr>
                            <td>{{$pharmacy->name}}</td>
                            <td>{{$pharmacy->treatment}}</td>
                            <td>{{$pharmacy->visit_id}}</td>
                            <td>
                                <a href="{{route('pharmacy.edit',$pharmacy->id)}}" class="text-decoration-none"> <i class="fa-solid fa-pen mr-3"></i>
                                </a>
                                <a href="{{route('pharmacy.destroy',$pharmacy->id)}}" class="text-decoration-none"> <i class="fa-solid fa-trash"></i>
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