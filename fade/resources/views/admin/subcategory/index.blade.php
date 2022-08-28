@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('category')}}">Category</a></li>
        <li class="breadcrumb-item active"><a href="{{route('subcategory')}}">Subcategory</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white"></h3>Subcategory List</div>
            <div class="card-body">
                <table>
                    <th></th>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white">Add Subcategory</h3></div>

            <div class="card-body">
                @if (session('subcategoryadd'))
            <div class="alert alert-success">{{ session('subcategoryadd') }}</div>
            @endif
                <form action="{{ route('subcategory.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                       <select name="category_id" id="">
                        <option  value="">--Select Category--</option>
                        @foreach($allcategories as $category)
                        <option  value="{{ $category->id}}">{{ $category->category_name }}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                        <label for="" class="form-label">Subcategory Image</label>
                        <input type="file" name="subcategory_image" class="form-control">
                    </div> --}}
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary ">Add Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
