@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="ri-edit-box-line"></i> Edit Surgery</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('surgery.update',$surgery->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $surgery->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                    <div class="col-md-6">
                        <input id="time" type="datetime-local" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $surgery->time }}" required autocomplete="name" autofocus>

                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="doctor" class="col-md-4 col-form-label text-md-end">{{ __('Doctor') }}</label>

                    <div class="col-md-6">
                        <select name="doctor_id" id="doctor" class="form-control">
                            <option disabled selected>pick doctor</option>

                            @foreach($doctors as $user)
                            <option {{$surgery->doctor_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('doctor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nurse" class="col-md-4 col-form-label text-md-end">{{ __('Nurse') }}</label>

                    <div class="col-md-6">
                        <select name="nurse_id" id="nurse" class="form-control">
                            <option disabled selected>pick nurse</option>

                            @foreach($nurses as $user)
                            <option {{$nursesForSurgery == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('nurse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
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