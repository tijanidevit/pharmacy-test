@extends('admin.layout.app')

@section('title')
    Notifications
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-bale">
                    <h5>Notifications List</h5>
                </div>
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="myTable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Notification Date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($notifications as $notification)
                                <tr>

                                    <td>{{json_decode($notification->data)->message}}</td>
                                    <td>{{$notification->created_at->format('d/m/y')}}</td>

                                    <td>
                                        <ul>
                                            <li title="View notification">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle{{$notification->id}}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle{{$notification->id}}" aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header d-bale text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel22">{{json_decode($notification->data)->message}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="remove-box my-4">
                                                    <ol>
                                                        @foreach (json_decode($notification->data)->stocks as $stock)
                                                        <li>
                                                            {{$stock->product?->name}}  with batch number {{$stock->batch_no}} purchased on {{$stock->purchase_date}} will expire on {{$stock->created_at}}. There are {{$stock->remaining_quantity}} items left
                                                        </li>
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>No notification received yet</p>
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
