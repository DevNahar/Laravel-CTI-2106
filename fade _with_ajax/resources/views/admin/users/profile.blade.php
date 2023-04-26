@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profile')}}">Profile</a></li>
    </ol>
</div>

    <div class="row">
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header"><h3>Change Name</h3></div>

                <div class="card-body">
                    @if (session('nameUpdate'))
                        <div class="alert alert-success">{{ session('nameUpdate') }}</div>

                    @endif
                    <form action="{{ route('name.change') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name"   value="{{ Auth::User()->name }}" class="form-control">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary ">Name Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header"><h3>Change Photo</h3></div>

                <div class="card-body">
                    @if (session('photo_success'))
                        <div class="alert alert-success">{{ session('photo_success') }}</div>

                    @endif
                    <form action="{{ route('photo.change') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="profile_photo"  class="form-control">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary ">Photo Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header"><h3>Change Password</h3></div>

                <div class="card-body">
                    @if (session('passUpdate'))
                        <div class="alert alert-success">{{ session('passUpdate') }}</div>

                    @endif
                    <form action="{{ route('pass.change') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1 form-level"><strong>Old Password</strong></label>
                            <input type="password" name="oldPassword"class="form-control">
                            @error('oldPassword')
                             <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        @if (session('errorpass'))
                        <strong class="text-danger">{{ session('errorpass') }}</strong>

                        @endif

                        @if (session('pass_success'))
                        <div class="alert alert-success">{{ session('pass_success') }}</div>

                        @endif

                        <div class="form-group mt-3">
                            <label class="mb-1 form-level"><strong>New Password</strong></label>
                            <input type="password" name="password"class="form-control">
                            @error('password')
                             <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="mb-1 form-level"><strong>Confirm Password</strong></label>
                            <input type="password" name="password_confirmation"class="form-control">
                            @error('password_confirmation')
                             <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary ">Password Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

