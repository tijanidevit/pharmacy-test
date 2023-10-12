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
            <a class="" href="{{route('customer.product.index')}}">
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
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('customer.product.index')}}">
                            <i class="ri-home-line"></i>
                            <span>Products</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('customer.purchase.index')}}">
                            <i class="ri-home-line"></i>
                            <span>Purchases</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
