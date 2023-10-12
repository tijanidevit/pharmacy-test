<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a class="" href="{{route('admin.dashboard')}}" data-bs-original-title="" title="">
                {{-- <img class="img-fluid for-white" src="assets/images/logo/full-white.png" alt="logo"> --}}
                <h3 class="text-white">Lytton {{auth()->user()->role}}</h3>
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a class="" href="{{route('admin.dashboard')}}">
                {{-- <img class="img-fluid main-logo main-white" src="assets/images/logo/logo.png" alt="logo">
                <img class="img-fluid main-logo main-dark" src="assets/images/logo/logo-white.png"
                    alt="logo"> --}}
                <h3 class="text-white">Lytton {{auth()->user()->role}}</h3>
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.dashboard')}}">
                            <i class="ri-home-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{route('admin.product.index')}}">Products</a>
                            </li>

                            <li>
                                <a href="{{route('admin.product.create')}}">Add New Product</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{route('admin.category.index')}}">Categories List</a>
                            </li>

                            <li>
                                <a href="{{route('admin.category.create')}}">Add New Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-archive-line"></i>
                            <span>Sale</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{route('admin.sale.index')}}">Sales</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Customers</span>
                        <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div></a>
                        <ul class="sidebar-submenu" style="display: none;">
                            <li>
                                <a href="{{route('admin.customer.index')}}" class="active">All customers</a>
                            </li>
                            <li>
                                <a href="{{route('admin.customer.create')}}">Add new customers</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
