@extends('admin.layout.app')

@section('title')
    Products
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Products List</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a class="btn btn-solid" href="{{route('admin.product.create')}}">Add Product</a>
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
                                    <th>Category</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{$product->image}}" class="img-fluid"alt="">
                                        </div>
                                    </td>

                                    <td>{{$product->name}}</td>

                                    <td>{{$product->category?->name}}</td>

                                    <td>
                                        <ul>
                                            <li title="View product">
                                                <a href="{{route('admin.product.show', $product->id)}}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li title="Delete product">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle{{$product->id}}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle{{$product->id}}" aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header d-block text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="remove-box">
                                                    <p>Deleting <strong>{{$product->name}}</strong> will remove its reocrd and related records</p>
                                                </div>
                                            </div>
                                            <form class="modal-footer" method="POST" action="{{route('admin.product.delete', $product->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex justify-content-center my-3" style="gap: 9px">
                                                    <button type="button" style="width: 20%" class="mr-3 btn btn-animation btn-md fw-bold btn-danger" data-bs-dismiss="modal">No</button>
                                                <button style="width: 20%" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>No product added yet</p>
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
