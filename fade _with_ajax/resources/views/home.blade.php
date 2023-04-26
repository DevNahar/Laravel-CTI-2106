@extends('layouts.dashboard')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">

        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
    </ol>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ Auth::user()->name }}</strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to Dashboard') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
