@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Craete Visit</h6>
        </div>
        <div class="card-body">
            @csrf
            <form method="POST" action="{{ route('pharmacy.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Treatment') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="treatment" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Nurse') }}</label>

                    <div class="col-md-6">
                        <select name="visit_id" id="" class="form-control">
                            <option disabled selected>pick visit</option>

                            @foreach($visits as $visit)
                            <option value="{{$visit->id}}">{{$visit->id}}</option>
                            @endforeach
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Pharmacy') }}</label>

                    <div class="col-md-6">
                        <select name="pharma_id" id="" class="form-control">
                            <option disabled selected>pick pharmacy</option>

                            @foreach($pharma as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection