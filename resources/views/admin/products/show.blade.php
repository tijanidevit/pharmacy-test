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
                    <h4 class="mb-2">{{ $product->name }}</h4>

                    <p>Description: {{$product->description}}</p>
                    <p>Added by: {{$product->owner?->name}}</p>
                    <p>Category: {{$product->category?->name}}</p>
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
                                    <th>Purchase date</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    {{-- <th>Option</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($product->sales as $sale)
                                <tr>

                                    <td>{{$sale->created_at->format('d-m-Y')}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>&#8358;{{$sale->price}}</td>
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
