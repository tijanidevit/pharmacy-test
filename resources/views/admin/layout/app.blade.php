
<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('admin.layout.head')


<body>
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('admin.layout.header')


        <div class="page-body-wrapper">
            @include('admin.layout.sidebar')

            <div class="page-body">
                <div class="container-fluid">
                    @yield('body')
                </div>
            </div>
        </div>

        @include('admin.layout.footer')
    </div>
</body>
</html>
@include('admin.layout.scripts')
@yield('extra-scripts')
