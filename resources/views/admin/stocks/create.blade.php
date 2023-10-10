@extends('admin.layout.app')

@section('title')
    Add Stock
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Stock Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('stock.store')}}">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Purchase Date</label>
                                <div class="col-sm-9">
                                    <input id="purchaseDate" required class="form-control" name="purchase_date" value="{{old('purchase_date')}}" type="date" placeholder="Purchase Date">
                                    @error('purchase_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Expiry Date</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="expiry_date" value="{{old('expiry_date')}}" type="date" placeholder="Expiry Date">
                                    @error('expiry_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Product</label>
                                <div class="col-sm-9">
                                    <select required class="js-example-basic-single w-100" name="product_id" value="{{old('name')}}">
                                        <option value="" selected disabled>Select Product</option>
                                        @forelse ($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('product_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Price (&#8358;)</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="price" value="{{old('price')}}" type="text" placeholder="Price">
                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Quantity</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="quantity" value="{{old('quantity')}}" type="text" placeholder="Quantity">
                                    @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 col-form-div form-div-title"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-orange">Add Stock</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-scripts')
    <script>
        document.getElementById('purchaseDate').valueAsDate = new Date();
    </script>
@endsection
