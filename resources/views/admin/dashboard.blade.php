@extends('admin.layout.app')

@section('title')
    Dashboard
@endsection

@section('body')
    <div class="row">

        <div class="col-sm-4 col-xxl-4 col-lg-4">
            <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                <div class="custome-1-bg b-r-4 card-body">
                    <div class="media align-items-center static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Customers</span>
                            <h4 class="mb-0 counter">{{ $customersCount }}
                                <span class="badge badge-light-primary grow"></span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-user-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-xxl-4 col-lg-4">
            <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                <div class="custome-2-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Partners</span>
                            <h4 class="mb-0 counter">{{ $partnersCount }}
                                <span class="badge badge-light-danger grow">
                                    <i data-feather="trending-down"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-user-2-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-xxl-4 col-lg-4">
            <div class="main-tiles border-5 card-hover border-0  card o-hidden">
                <div class="custome-3-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Products</span>
                            <h4 class="mb-0 counter">{{ $productsCount }}
                                {{-- <a href="add-new-product.html" class="badge badge-light-secondary grow">
                                    ADD NEW</a> --}}
                            </h4>
                        </div>

                        <div class="align-self-center text-center">
                            <i class="ri-shopping-bag-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
