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
         Add Category
     </div>
     <div class="card">

         <div class="card-body">
             <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @include('admin.partials.messages')

                 <div class="form-group">
                     <label for="title">Name</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category name">
                 </div>
                 <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" rows="5" cols="80" class="form-control"></textarea>
                 </div>
                 <div class="form-group">
                     <label for="description">Parent Category (optional)</label>
                     <select class="form-control" name="parent_id">
                     <option value="">Select a Parent Category</option>
                         @foreach($main_categories as $category)
                         <option value="{{$category->id}}">
                             {{$category->name}}
                         </option>
                         @endforeach

                     </select>
                 </div>

                 <div class="form-group">
                     <label for="CategoryImage">Category Image (optional)</label>

                     <input type="file" class="form-control" name="image">
                 </div>
                 
                 <button type="submit" class="btn btn-primary">Add Category</button>
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