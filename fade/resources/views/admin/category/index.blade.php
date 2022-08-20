@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('category')}}">Categoty List</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Category List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Category Name</th>
                        <th>Category Image</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"> <h3>Add Categary</h3> </div>
            <div class="card-body">
                @if (session('category_image'))
                        <div class="alert alert-success">{{ session('category_image') }}</div>

                    @endif
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name"  class="form-control">
                        @error('category_name')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Image</label>
                        <input type="file" name="category_image"  class="form-control">
                        @error('category_image')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary ">Add Category</button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
