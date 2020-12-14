<div class="row">
    @foreach($products as $product)
    <div class="col-md-3">
        <div class="card">

            <!-- @php $i=1; @endphp -->
            @foreach($product->images as $image)
            <!-- @if($i>0) -->
            <a href="{{route('products.show',$product->slug)}}">
            <img class="card-img-top" src="{{asset('/images/products/'.$image->image)}}" alt="{{$product->title}}">
            </a>
            <!-- @endif -->
            <!-- @php $i--; @endphp -->

            @endforeach

            <div class="card-body">
                <h4 class="card-title text-center">
                <a href="{{route('products.show',$product->slug)}}">{{$product->title}}</a>
                </h4>
                <p class="text-center">TK-{{$product->price}}</p>

                <div class="text-center cart-btn">
                    <a href="#" class="btn btn-warning font-weight-bold">ADD to cart</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination mt-4">
    {{$products->links()}}
</div> 

