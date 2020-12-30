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
                            <h3 class="text-center text-white">All Products</h3>
                        </fieldset>
                    </div>

                   @include('frontend.pages.product.partials.all_products')

                </div>


            </div>

        </div>

    </div>
</section>

@endsection