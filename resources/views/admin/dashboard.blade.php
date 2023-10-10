@extends('admin.layout.app')

@section('title')
    Dashboard
@endsection

@section('body')
    <div class="row">
        <!-- chart caard section start -->
        {{-- <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                <div class="custome-1-bg b-r-4 card-body">
                    <div class="media align-items-center static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Revenue</span>
                            <h4 class="mb-0 counter">$6659
                                <span class="badge badge-light-primary grow">
                                    <i data-feather="trending-up"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-database-2-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                <div class="custome-2-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Orders</span>
                            <h4 class="mb-0 counter">9856
                                <span class="badge badge-light-danger grow">
                                    <i data-feather="trending-down"></i>8.5%</span>
                            </h4>
                        </div>
                        <div class="align-self-center text-center">
                            <i class="ri-shopping-bag-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0  card o-hidden">
                <div class="custome-3-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Products</span>
                            <h4 class="mb-0 counter">893
                                <a href="add-new-product.html" class="badge badge-light-secondary grow">
                                    ADD NEW</a>
                            </h4>
                        </div>

                        <div class="align-self-center text-center">
                            <i class="ri-chat-3-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3 col-lg-6">
            <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                <div class="custome-4-bg b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="media-body p-0">
                            <span class="m-0">Total Customers</span>
                            <h4 class="mb-0 counter">4.6k
                                <span class="badge badge-light-success grow">
                                    <i data-feather="trending-down"></i>8.5%</span>
                            </h4>
                        </div>

                        <div class="align-self-center text-center">
                            <i class="ri-user-add-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-12">
            <div class="card o-hidden card-hover">
                <div class="card-header border-0 pb-1">
                    <div class="card-header-title p-0">
                        <h4>Categories</h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="category-slider no-arrow">
                        @forelse ($data['recentCategories'] as $category)
                        <div>
                            <div class="dashboard-category">
                                <a href="javascript:void(0)" class="category-image">
                                    <img src="{{$category->image}}" class="img-fluid" alt="">
                                </a>
                                <a href="javascript:void(0)" class="category-name">
                                    <h6>{{$category->name}}</h6>
                                </a>
                            </div>
                        </div>
                        @empty
                            <p>No category added yet!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- chart card section End -->


        <!-- Recent orders start-->
        <div class="col-xl-6">
            <div class="card o-hidden card-hover">
                <div class="card-header card-header-top card-header--2 px-0 pt-0">
                    <div class="card-header-title">
                        <h4>Expiring within 3 months</h4>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div>
                        <div class="table-responsive">
                            <table class="best-selling-table table border-0">
                                <tbody>
                                    @forelse ($data['expiringStocks'] as $stock)
                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>{{$stock->product?->name}}</h5>
                                                        <h6>{{$stock->batch_no}}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Purchase date</h6>
                                                    <h5>{{$stock->formatDate('purchase_date')}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Expiry date</h6>
                                                    <h5>{{$stock->formatDate('expiry_date')}} ({{$stock->expiry_difference}} days)</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Ordered quantity</h6>
                                                    <h5>{{$stock->quantity}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Remaining quantity</h6>
                                                    <h5>{{$stock->remaining_quantity}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>&#8358;{{$stock->price}}</h5>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <P>No expiring stocks</P>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent orders end-->


        <div class="col-xl-6">
            <div class="card o-hidden card-hover">
                <div class="card-header card-header-top card-header--2 px-0 pt-0">
                    <div class="card-header-title">
                        <h4>Recently added stocks</h4>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div>
                        <div class="table-responsive">
                            <table class="best-selling-table table border-0">
                                <tbody>
                                    @forelse ($data['recentStocks'] as $stock)
                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>{{$stock->product?->name}}</h5>
                                                        <h6>{{$stock->batch_no}}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Purchase date</h6>
                                                    <h5>{{$stock->formatDate('purchase_date')}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Expiry date</h6>
                                                    <h5>{{$stock->formatDate('expiry_date')}} ({{$stock->expiry_difference}} days)</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Ordered quantity</h6>
                                                    <h5>{{$stock->quantity}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Remaining quantity</h6>
                                                    <h5>{{$stock->remaining_quantity}}</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>&#8358;{{$stock->price}}</h5>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <P>No expiring stocks</P>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
