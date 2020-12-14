@extends('frontend.layout.master')

@section('title')
{{$product->title}} | Tech House
@endsection

@section('content')
<section class="cake-gallery">
    <div class="container">
        <div class="row category">
            <div class="col-md-4" style="margin-top:29px;">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i=1; @endphp
                        @foreach($product->images as $image)
                        <div class="carousel-item {{$i==1 ? 'active' : ''}}">
                            <img class="d-block w-100" src="{{asset('../images/products/'.$image->image)}}"
                                alt="First slide">
                        </div>
                        @php $i++; @endphp

                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="">
                    <p>Category <span class="badge badge-info">{{$product->category->name}}</span></p>
                    <p>Brand <span class="badge badge-info">{{$product->brand->name}}</span></p>
                </div> 

            </div>

            <div class="col-md-8">
                <div class="widget">
                <h2>{{$product->title}}</h2>
                    <h5 class="text-danger">{{$product->price}} Taka
                        <span class="badge badge-primary">
                            {{$product->quantity <1 ? 'No item is Available' : $product->quantity .' item in stock'  }}
                        </span>
                    </h5>
                    <hr>
                    <div class="product-description">
                        {{$product->description}}
                    </div>
                </div>


            </div>

        </div>

    </div>
</section>

@endsection