@extends('admin.layout.app')

@section('title')
    Add Sale
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Sale Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('sale.store')}}">
                            @csrf

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Product</label>
                                <div class="col-sm-9">
                                    <select required id="productSelect" class="js-example-basic-single w-100" name="product_id" value="{{old('name')}}">
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
                                <label class="col-sm-3 col-form-label form-label-title">Stock</label>
                                <div class="col-sm-9">
                                    <select required  id="stockSelect" class="js-example-basic-single w-100" name="stock_id" value="{{old('name')}}">
                                        <option value=""  selected disabled>Select Stock</option>
                                    </select>
                                    @error('stock_id')
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
                                    <button class="btn btn-orange">Add Sale</button>
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
        $('#productSelect').change(function(){
            const productId = $(this).val()
            fetch(`/api/products/${productId}/stocks/`)
            .then(response => response.json()) // Parse the response as JSON
            .then(data => {
                console.log('data', data)
                data.map(stock => {
                    $('#stockSelect').append(`<option value='${stock.id}'> ${stock.batch_no} </option`);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        })
    </script>
@endsection
