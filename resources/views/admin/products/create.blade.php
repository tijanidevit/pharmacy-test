@extends('admin.layout.app')

@section('title')
    Add Product
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Product Name">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                <div class="col-sm-9">
                                    <select required class="js-example-basic-single w-100" name="category_id" value="{{old('name')}}">
                                        <option value="" selected disabled>Select Category</option>
                                        @forelse ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label
                                    class="col-sm-3 col-form-label form-label-title">Image</label>
                                <div class="col-sm-9">
                                    <input required name="image" class="form-control form-choose" type="file" accept="image/*">
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Price (&#8358;)</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="price" value="{{old('price')}}" type="number" placeholder="Price">
                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Quantity</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" min="1" name="quantity" value="{{old('name')}}" type="number" placeholder="Quantity">
                                    @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Description</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="description" value="{{old('description')}}" type="text" placeholder="Description">
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 col-form-div form-div-title"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-orange">Add Product</button>
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
