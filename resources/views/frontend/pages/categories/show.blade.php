 @extends('frontend.layout.master')

@section('content')
<section class="cake-gallery">
    <div class="container">
        <div class="row category">
            <div class="col-md-3" style="margin-top:29px;">
               
            @include('frontend.partials.sidebar')
            
            </div>

            <div class="col-md-9">
                <div class="widget">
                    <div class="heading" id="iphone" style="margin-bottom:20px;">
                        <fieldset class="fieldset">
                            {{-- <h3 class="text-center text-white">iphone</h3> --}}
                            <h3 class="text-center text-white">All Products in 
                                <span class="badge badge-warning">{{$category->name}} Category</span>
                            </h3>
                        </fieldset>
                    </div>
                
                 @php
                     $products=$category->products()->paginate(4);
                 @endphp

                 @if ($products->count() >0)
                     @include('frontend.pages.product.partials.all_products')

                  @else
                    <div class="alert alert-warning">
                        No Product has added yet in this category !!!
                    </div>
                 @endif

                   

                </div>


            </div>

        </div>

    </div>
</section>

@endsection