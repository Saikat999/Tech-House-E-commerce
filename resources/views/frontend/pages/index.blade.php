 @extends('frontend.layout.master')

 <!-- ---------Start HomeSlider page ------------- -->
 @section('content')
 <section class="homeslider">
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner" role="listbox">

             <div class="search-sec">
                 <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                         <div class="transparent-sec">
                             <div class="container heading">
                                 <h2 class="display-6 text-center text-white">Tech House</h2>
                                 <p class="lead text-center text-white font-italic">We assure you the quality not
                                     quantity</p>
                                 <form action="{{route('search')}}" method="get">

                                     <div class="row">
                                         <div class="input-group col-md-2"></div>
                                         <div class="input-group mb-3 col-md-8">
                                             <input type="text" class="form-control" name="search"
                                                 placeholder="Search Your Favourite One">
                                             <div class="input-group-append"> <button class="btn btn-warning"
                                                     type="button" id="button-addon2"><i
                                                         class="fa fa-search"></i></button> </div>
                                         </div>
                                         <div class="input-group col-md-2"></div>
                                     </div>


                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-3"></div>
                 </div>
             </div>

             <div class="carousel-item active" style="background-image: url('../images/ipad-pro-11.jpg')">

             </div>

             <div class="carousel-item" style="background-image: url('../images/iphone-12.jpg')">

             </div>
             <div class="carousel-item" style="background-image: url('../images/galaxy-s20.jpg')">

             </div>
             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
     </div>

 </section>

 <!-- End Slider part -->


 <!-- Start Gallery part -->
 <section class="gallery">
     <div class="container">
         <h2 class="text-center">-- Our products --</h2>
         <div class="row">
             <div class="col-md-3" style="margin-top:29px;">

                @include('frontend.partials.sidebar')
                
             </div>

             <div class="col-md-9">
                 <div class="widget">
                     <div class="heading" id="iphone" style="margin-bottom:20px;">
                         <fieldset class="fieldset">
                             <h3 class="text-center text-white">All Category Products</h3>
                         </fieldset>
                     </div>
                     @include('frontend.pages.product.partials.all_products')
                 </div>
             </div>
         </div>
     </div>

 </section>

 <!-- End Gallery part -->
 <section class="contact" id="contactpart">
     <h2 class="text-center">--Contact Us--</h2>
 </section>


 <!-- Start Footer part -->
 <section class="footer">
     <p class="text-center">@2020, All rights reseverd | Tech House</p>
 </section>
 <!-- End Footer part -->

 @endsection

 <!-- --------End HomeSlider page ------------- -->