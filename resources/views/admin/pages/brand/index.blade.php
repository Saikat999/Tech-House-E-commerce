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
        Manage Brand
    </div>
    <div class="card">

        <div class="card-body">
        @include('admin.partials.messages')
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Action</th>
                </tr>
                @foreach($brands as $brand)
                <tr>
                    <td>#</td>
                    <td>{{$brand->name}}</td>
                    <td>
                    <img src="{{asset('images/brands/'.$brand->image)}}" width="100"> 
                    </td>
                    
                    
                    <td>
                        <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-success">Edit</a>
                        <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                        <!--  Delete Modal -->
                        <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$brand->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Are you sure you want to delete this item?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success"
                                            data-dismiss="modal">Cancel</button>

                                            <form action="{{route('admin.brand.delete',$brand->id)}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                            
                                            </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach
            </table>
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