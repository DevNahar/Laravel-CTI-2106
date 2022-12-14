@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('users')}}">Users</a></li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header bg-primary"><h3 class="text-white">User List ({{ $total_user }})</h3></div>
                @if (session('delete'))
                    <div class="alert alert-success">{{ session('delete') }}</div>


                @endif


                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th class="bg-dark text-white">Sr</th>
                            <th>User pic</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $key=> $user)

                        <tr>
                            <td class="bg-dark text-white w-5">{{++$key}}</td>
                            <td>
                                @if ($user->profile_photo == null)
                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" width="50" />

                                    @else
                                         <img src="{{ asset('/uploads/users') }}/{{ $user->profile_photo }}" width="50"
                                        alt="hhh" />
                                    @endif

                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td> <a href="{{ route('del.user', $user->id) }}" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
