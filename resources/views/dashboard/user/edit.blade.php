@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            @csrf
           <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <select name="role" id="" class="form-control">

                            <option disabled >pick role</option>
                            <option {{$user->role == 'doctor' ? 'selected' : ''}} value="doctor">doctor</option>
                            <option {{$user->role == 'admin' ? 'selected' : ''}} value="admin">admin</option>
                            <option {{$user->role == 'nurse' ? 'selected' : ''}} value="nurse">nurse</option>
                            <option {{$user->role == 'patient' ? 'selected' : ''}} value="patient">patient</option>
                            <option {{$user->role == 'pharmacy' ? 'selected' : ''}} value="pharmacy">pharmacy</option>
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                    <div class="col-md-6">
                        <select name="department_id" id="" class="form-control">
                            <option disabled >pick department</option>

                            @foreach($departments as $department)
                                    <option {{$user->department_id == $department->id ? 'selected' : ''}} value="{{$department->id}}">{{$department->name}}</option>
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
                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                    <div class="col-md-6">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" {{$user->gender == 'male' ? 'checked' : ''}} id="male"  value="male">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" {{$user->gender == 'female' ? 'checked' : ''}} id="female" value="female">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control" id="image">
                        <img src="{{asset($user->image)}}" class="img-thumbnail mt-1" alt="" height="100" width="100">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
{{-- 
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div> --}}

                <div class="row mb-0">
                    <div class="col-md-6 block offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection