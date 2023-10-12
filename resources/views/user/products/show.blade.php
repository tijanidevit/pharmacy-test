@extends('user.layout.app')

@section('title')
    Products
@endsection

@section('body')
    <div class="main-tiles border-5 border-0  card-hover card o-hidden">
        <div class="row card-body">

            <div class="col-sm-6 col-xxl-6 col-lg-6">
                <img style="width: 100%; margin-right: 2.5em" src="{{$product->image}}" alt="{{$product->name}}">

                <div class="my-2">
                    {{$product->description}}
                </div>
            </div>

            <div class="col-sm-6 col-xxl-6 col-lg-6">
                @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                @endif
                <div class="custom-1-bg b-r-4">
                    <div class="media align-items-center static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">{{$product->category?->name}}</span>
                            <h4 class="mb-0 counter">{{$product->name}}
                                <span class="badge badge-light-primary grow"></span>
                            </h4>
                            <p class="my-1">&#8358; {{$product->price}}</p>
                            <p>{{$product->quantity}} available</p>
                        </div>


                    </div>


                </div>

                <div class="my-3">
                    <h4>Purchase</h4>
                    <form action="{{route('customer.product.buy', $product->id)}}" method="post">
                        @csrf
                        <div class="form-group my-3">
                            <label for="quantity">Quantity</label>
                            <input min="1" max="{{$product->quantity}}" class="form-control" value="{{old('quantity')}}" type="number" name="quantity" id="quantity">
                            @error('quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-success">Purchase</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
