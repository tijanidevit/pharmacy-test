@extends('admin.layout.app')

@section('title')
   {{$category->name}}
@endsection

@section('body')
<div class="row">
    <div class="col-xl-12">
        <div class="card o-hidden card-hover">
            <div class="card-header card-header-top card-header--2 px-0 pt-0">
                <div class="card-header-title">
                    <h4>{{ $category->name }} products</h4>
                </div>
            </div>

            <div class="card-body p-0">
                <div>
                    @if (session('success'))
                    <div class="alert btn-orange">{{session('success')}}</div>
                    @endif
                    <table class="table all-package theme-table table-product" id="myTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($category->products as $product)
                            <tr>
                                <td>
                                    <div class="table-image">
                                        <img src="{{$product->image}}" class="img-fluid"alt="">
                                    </div>
                                </td>

                                <td>{{$product->name}}</td>

                                <td>
                                    <ul>
                                        <li title="View product">
                                            <a href="{{route('admin.product.show', $product->id)}}">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
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

@endsection

@section('extra-scripts')
    <script>
        function openDeleteModal(id, batchNo){
            console.log('id', id)
            // $('#exampleModalToggle').modal('show')
        }
    </script>
@endsection
