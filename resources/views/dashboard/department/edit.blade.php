@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Craete Department</h6>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
                
                <div class="form-group">
                    <textarea name="description" class="form-control">add description</textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-block btn-primary" role="submit">Add</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection