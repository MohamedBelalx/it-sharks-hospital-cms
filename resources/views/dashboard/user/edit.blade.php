@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="ri-edit-box-line"></i> Department</h6>
        </div>
        <div class="card-body">
            <form action="{{route('department.update',$department->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$department->name}}">
                </div>
                
                <div class="form-group">
                    <textarea name="description" class="form-control">{{$department->description}}</textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-block btn-primary" role="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection