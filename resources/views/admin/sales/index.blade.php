@extends('admin.layout.app')

@section('title')
    Sales
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-bale">
                    <h5>Sales List</h5>
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
                                    <th>Quantity</th>
                                    <th>Sales date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($sales as $sale)
                                <tr>

                                    <td>{{$sale->stock?->batch_no}}</td>
                                    <td>{{$sale->product?->name}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>{{$sale->owner->name}}</td>
                                    <td>{{$sale->created_at}}</td>

                                    <td>
                                        <ul>
                                            <li title="Delete sale">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle{{$sale->id}}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle{{$sale->id}}" aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header d-bale text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="remove-box">
                                                    <p>Deleting this sales will remove its reocrd and related records</p>
                                                </div>
                                            </div>
                                            <form class="modal-footer" method="POST" action="{{route('admin.sale.delete', $sale->id)}}">
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
