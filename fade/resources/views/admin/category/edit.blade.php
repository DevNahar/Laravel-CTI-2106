@extends('layouts.dashboard');
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item "><a href="">Categoty</a></li>
        <li class="breadcrumb-item active"><a href="">Edit Categoty</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary "> <h3 class="text-white">Edit Categary</h3> </div>
            <div class="card-body">
                @if (session('category_update'))
                        <div class="alert alert-success">{{ session('category_update') }}</div>

                    @endif
                <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" value="{{ $category_info->category_name }}"  class="form-control">
                        {{-- @error('category_name')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Image</label>
                        <input type="file" name="category_image"  class="form-control"  onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <img src="{{ asset('uploads/categories') }}/{{ $category_info->category_image }}" id="img" width="100" alt="">
                        {{-- @error('category_image')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror --}}
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary ">Update Category</button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
