<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>{{ trans('common.AppMax Invenotry System') }} - @yield('page-title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!--end::Fonts -->

    @section('style')

    @show

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ config('app.root_route_group') }}/assets/plugins/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.root_route_group') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->


    <!--end::Layout Skins -->
    {{-- <link rel="shortcut icon" href="{{ config('app.root_route_group') }}/assets/images/favicon.ico" /> --}}
    <link rel="apple-touch-icon" sizes="120x120" href="{{ config('app.root_route_group') }}/assets/images/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ config('app.root_route_group') }}/assets/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ config('app.root_route_group') }}/assets/images/icon/favicon-16x16.png">
    <link rel="manifest" href="{{ config('app.root_route_group') }}/assets/images/icon/site.webmanifest">
    <link rel="mask-icon" href="{{ config('app.root_route_group') }}/assets/images/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <style>
        .bg-login-color {
            background: white;
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="bg-login-color kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

<!-- begin::Page loader -->

<!-- end::Page Loader -->

<!-- begin:: Page -->
@section('content')
    <p>This is my body content.</p>
@show

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        // "colors": {
        //     "state": {
        //         "brand": "#591df1",
        //         "light": "#ffffff",
        //         "dark": "#282a3c",
        //         "primary": "#5867dd",
        //         "success": "#34bfa3",
        //         "info": "#36a3f7",
        //         "warning": "#ffb822",
        //         "danger": "#fd3995"
        //     },
        //     "base": {
        //         "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
        //         "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        //     }
        // }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ config('app.root_route_group') }}/assets/plugins/plugins.bundle.js" type="text/javascript"></script>
<script src="{{ config('app.root_route_group') }}/assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ config('app.root_route_group') }}/assets/js/login-general.js" type="text/javascript"></script>

@section('script')

@show

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
