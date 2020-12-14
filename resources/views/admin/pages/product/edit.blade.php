@extends('admin.layouts.master')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="card-header text-center font-weight-bold">
        Edit Product
    </div>
    <div class="card">

        <div class="card-body">
            <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
               @include('admin.partials.messages')

                <div class="form-group">
                    <label for=title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="5" cols="80" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                </div>

                <div class="form-group">
                    <label for="selectCategory">Select Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">Please select a category for the product</option>
                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                          <option value="{{$parent->id}}" {{$parent->id == $product->category->id ? 'selected' : ''}}>{{$parent->name}}</option>

                          @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                          <option value="{{$child->id}}" {{$child->id == $product->category->id ? 'selected' : ''}}>----->{{$child->name}}</option>
                          @endforeach

                        @endforeach
                    </select>
                </div> 

                <div class="form-group">
                    <label for="selectCategory">Select Brand</label>
                    <select class="form-control" name="brand_id">
                        <option value="">Please select a brand for the product</option>
                        @foreach(App\Models\Brand::orderBy('name','asc')->get() as $br)
                          <option value="{{$br->id}}" {{$br->id == $product->brand->id ? 'selected' : ''}}>{{$br->name}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <div class="row">
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                        </div>
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                        </div>
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>





    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->

@endsection