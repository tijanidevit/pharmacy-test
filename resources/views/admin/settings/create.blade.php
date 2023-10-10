@extends('admin.layout.app')

@section('title')
    Add Contact
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Contact Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('setting.store')}}">
                            @csrf

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
                                <label class="form-label-title col-sm-3 mb-0">Phone number</label>
                                <div class="col-sm-9">
                                    <input required class="form-control" name="phone" value="{{old('phone')}}" type="text" placeholder="Phone number">
                                    @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 col-form-div form-div-title"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-orange">Add Contact</button>
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
@section('extra-scripts')
    <script>
        document.getElementById('purchaseDate').valueAsDate = new Date();
    </script>
@endsection
