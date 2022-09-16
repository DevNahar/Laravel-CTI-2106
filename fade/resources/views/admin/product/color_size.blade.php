@extends('layouts.dashboard')
@section('content')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('product.list') }}">Product List</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('add.color.size') }}">Product Color & size</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8"></div>
    <div class="col-lg-4">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white">Add Colors</h3></div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Color Name</label>
                        <input type="text" class="form-control" name="color_name" >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Color Code</label>
                        <input type="text" class="form-control" name="color_code">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Color</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>


@endsection