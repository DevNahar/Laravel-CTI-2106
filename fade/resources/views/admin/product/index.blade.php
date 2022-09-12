@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('add.product')}}">Product</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white"> Add Product</h3></div>
            <div class="card-body">
                {{-- @if (session('preview'))
                    <div class="alert alert-success">{{ session('preview') }}</div>
                @endif --}}
                <form action="{{  route('product.store')  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="">--Select Subcategory--</option>
                                    {{-- @foreach ($subcategories as $subcategory)
                                    <option value="">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Product Price</label>
                                <input type="text" name="product_price"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Product Discount</label>
                                <input type="text" name="discount"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Product Brand</label>
                                <input type="text" name="brand"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Short Description</label>
                                <input type="text" name="short_desp"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Long Description</label>
                              <div><textarea name="long_desp" id="summernote" class="form-control" cols="85" rows="5"></textarea>
                              </div></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Preview Image</label>
                                <input type="file" name="preview"  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Thumbnails Image</label>
                                <input type="file" name="thumbnails[]" multiple  class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4" >
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary ">Add Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
<script>
    $('#category_id').change(function(){
        let categoryValue = $(this).val();
        // alert(categoryValue);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: '/getsubcategory',
            data:{'c_id': categoryValue},
            success:function(data){
                $('#subcategory_id').html(data);
            }
        });


    });

</script>

{{-- sweetAlert --}}

@if (session('preview'))
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Preview image Added!!',
  showConfirmButton: false,
  timer: 1500
})
</>
@endif
{{-- sweetAlert --}}
@endsection
