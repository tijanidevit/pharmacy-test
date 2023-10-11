@extends('admin.layout.app')

@section('title')
    Add Moderator
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Moderator Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data" action="{{route('admin.moderator.store')}}">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Moderator Name</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Moderator Name">
                                    @error('name')
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
                                <label class="form-label-title col-sm-3 mb-0">Email address</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Email address">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 col-form-div form-div-title"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-orange">Add Moderator</button>
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
