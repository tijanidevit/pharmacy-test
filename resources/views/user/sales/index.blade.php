@extends('user.layout.app')

@section('title')
Purchases
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-bale">
                    <h5>Purchase List</h5>
                </div>
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="myTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price (&#8358;)</th>
                                    <th>Pharmacy</th>
                                    <th>Purchase date</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($sales as $sale)
                                <tr>
                                    <td>{{$sale->product?->name}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>{{$sale->price}}</td>
                                    <td>{{$sale->product?->owner?->name}}</td>
                                    <td>{{$sale->created_at}}</td>
                                </tr>

                                @empty
                                <p>No sale added yet</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
