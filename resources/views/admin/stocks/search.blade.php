@extends('admin.layout.app')

@section('title')
    Search Result
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Search Result</h5>
                </div>
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="myTable">
                            <thead>
                                <tr>
                                    <th>Batch number</th>
                                    <th>Product</th>
                                    <th>Purchase date</th>
                                    <th>Expiry date</th>
                                    <th>Expiry status</th>
                                    <th>Ordered quantity</th>
                                    <th>Remaining quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($stocks as $stock)
                                <tr>

                                    <td>{{$stock->batch_no}}</td>
                                    <td>{{$stock->product?->name}}</td>
                                    <td>{{$stock->formatDate('purchase_date')}}</td>
                                    <td @class(['text-danger' => $stock->hasExpired(),'text-success' => !$stock->hasExpired()])>
                                        {{$stock->formatDate('expiry_date')}} ({{$stock->expiry_difference}} days)
                                    </td>
                                    <td @class(['text-danger' => $stock->hasExpired(),'text-success' => !$stock->hasExpired()])>{{$stock->expiry_status}}</td>
                                    <td>{{$stock->quantity}}</td>
                                    <td>{{$stock->remaining_quantity}}</td>
                                    <td>&#8358;{{$stock->price}}</td>
                                </tr>

                                @empty
                                <p>No stock with the related batch number</p>
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
