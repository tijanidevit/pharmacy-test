@extends('admin.layout.app')

@section('title')
   {{$product->name}}
@endsection

@section('body')
<div class="row">
    <div class="col-xl-12">
        <div class="card o-hidden card-hover">
            <div class="card-header card-header-top card-header--2 px-0 pt-0">
                <div class="card-header-title">
                    <h4>{{ $product->name }} stocks</h4>
                </div>
            </div>

            <div class="card-body p-0">
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="myTable">
                            <thead>
                                <tr>
                                    <th>Batch number</th>
                                    <th>Purchase date</th>
                                    <th>Expiry date</th>
                                    <th>Expiry status</th>
                                    <th>Ordered quantity</th>
                                    <th>Remaining quantity</th>
                                    <th>Price</th>
                                    {{-- <th>Option</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($stocks as $stock)
                                <tr>

                                    <td>{{$stock->batch_no}}</td>
                                    <td>{{$stock->formatDate('purchase_date')}}</td>
                                    <td @class(['text-danger' => $stock->hasExpired(),'text-success' => !$stock->hasExpired()])>{{$stock->formatDate('expiry_date')}}</td>
                                    <td @class(['text-danger' => $stock->hasExpired(),'text-success' => !$stock->hasExpired()])>{{$stock->expiry_status}}</td>
                                    <td>{{$stock->quantity}}</td>
                                    <td>{{$stock->remaining_quantity}}</td>
                                    <td>&#8358;{{$stock->price}}</td>

                                    {{-- <td>
                                        <ul>
                                            <li title="Delete stock">
                                                <form title="Delete stock" action="{{ route('stock.delete', $stock->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn text-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td> --}}
                                </tr>

                                @empty
                                <p>No stock added yet</p>
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

@section('extra-scripts')
    <script>
        function openDeleteModal(id, batchNo){
            console.log('id', id)
            // $('#exampleModalToggle').modal('show')
        }
    </script>
@endsection
