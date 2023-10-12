@extends('user.layout.app')

@section('title')
    Products
@endsection

@section('body')
    <div class="row">

        <h3 class="mb-3">All Products</h3>

        @forelse ($products as $product)
            <div class="col-sm-4 col-xxl-4 col-lg-4">
                <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                    <div class="custome-1-bg b-r-4 card-body">
                        <div class="media align-items-center static-top-widget">
                            <div class="media-body p-0">
                                <span class="m-0">{{$product->category?->name}}</span>
                                <h4 class="mb-0 counter">{{$product->name}}
                                    <span class="badge badge-light-primary grow"></span>
                                </h4>
                                <p class="my-1">&#8358; {{$product->price}}</p>
                                <p>{{$product->quantity}} available</p>
                            </div>
                            <div class="align-self-center text-center">
                                <img style="width: 120px; margin-right: 2.5em" src="{{$product->image}}" alt="{{$product->name}}">

                            </div>
                        </div>

                        <div>
                            <a href="{{route('customer.product.show', $product->id)}}" class="btn btn-success">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No products available at the moment</p>
        @endforelse

    </div>

</div>
@endsection
