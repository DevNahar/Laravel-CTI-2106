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
            <div class="card-header bg-primary"><h3 class="text-white">Category List</h3> </div>
            <div class="card-body">
                @if (session('category_delete'))
                <div class="alert alert-success">{{ session('category_delete') }}</div>
            @endif
            @if (session('category_restore'))
                    <div class="alert alert-success">{{ session('category_restore') }}</div>
                @endif
                <table class="table table-striped ">
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($all_category as $key=> $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img width="50" src="{{asset('uploads/categories')}}/{{$category->category_image }}" alt=""> </td>
                        <td>{{ $category->rel_to_user->name }}</td>
                        <td>

                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Trushed Category List</h3> </div>
            <div class="card-body">
                @if (session('category_hard_delete'))
                    <div class="alert alert-success">{{ session('category_hard_delete') }}</div>
                @endif

                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($trashed_category as $key=> $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img width="50" src="{{asset('uploads/categories')}}/{{$category->category_image }}" alt=""> </td>
                        <td>{{ $category->rel_to_user->name }}</td>
                        <td>
                            <a href="{{ route('category.restore',$category->id) }}" class="btn btn-info btn-xs sharp"><i class="fa fa-undo"></i></a>
                            <a href="{{ route('category.hard.delete',$category->id) }}" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>

                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"> <h3 class="text-white">Add Categary</h3> </div>
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
