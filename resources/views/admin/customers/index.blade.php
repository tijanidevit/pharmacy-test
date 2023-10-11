@extends('admin.layout.app')

@section('title')
    Customers
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Customers List</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a class="btn btn-solid" href="{{route('admin.customer.create')}}">Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="myTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email address</th>
                                    <th>Address</th>
                                    <th>Date added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{$customer->image}}" class="img-fluid"alt="">
                                        </div>
                                    </td>

                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->created_at->format('d/m/Y')}}</td>

                                    <td>
                                        <ul>
                                            <li title="View customer">
                                                <a href="{{route('admin.customer.show', $customer->id)}}">
                                                    Purchases
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                <p>No customer added yet</p>
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
