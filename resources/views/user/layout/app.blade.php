
<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('user.layout.head')


<body>
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('user.layout.header')


        <div class="page-body-wrapper">
            @include('user.layout.sidebar')

            <div class="page-body">
                <div class="container-fluid">
                    @yield('body')
                </div>
            </div>
        </div>

        @include('user.layout.footer')
    </div>
</body>
</html>
@include('user.layout.scripts')
@yield('extra-scripts')
