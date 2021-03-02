<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>{{ trans('common.AppMax Invenotry System') }} - @yield('page-title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ config('app.root_route_group') }}/assets/plugins/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.root_route_group') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
@section('style')

@show

<!--end::Layout Skins -->
    {{-- <link rel="shortcut icon" href="{{ config('app.root_route_group') }}/assets/media/logos/favicon.ico" /> --}}
    <link rel="apple-touch-icon" sizes="120x120" href="{{ config('app.root_route_group') }}/assets/images/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ config('app.root_route_group') }}/assets/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ config('app.root_route_group') }}/assets/images/icon/favicon-16x16.png">
    <link rel="manifest" href="{{ config('app.root_route_group') }}/assets/images/icon/site.webmanifest">
    <link rel="mask-icon" href="{{ config('app.root_route_group') }}/assets/images/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="javascript:void(0);">
            <img src="/assets/images/logo-appmax.png" class="img-fluid mx-auto" alt="{{ trans('common.AppMax Invenotry System') }}" style="max-width: 100px;" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<!-- begin:: Page -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        @include("_shared.topbar")
        <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
                        <ul class="kt-menu__nav ">
{{--                            <li class="kt-menu__item " aria-haspopup="true">--}}
{{--                                <a href="{{ route('admin.group.list') }}" class="kt-menu__link ">--}}
{{--                                    <i class="kt-menu__link-icon fa fa-cog"></i>--}}
{{--                                    <span class="kt-menu__link-text">{{ trans('common.Groups') }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item " aria-haspopup="true">--}}
{{--                                <a href="{{ route('admin.certificate.list') }}" class="kt-menu__link ">--}}
{{--                                    <i class="kt-menu__link-icon fa fa-cog"></i>--}}
{{--                                    <span class="kt-menu__link-text">{{ trans('common.Certificates') }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            @if (Session::get('_user_')['use_type'] == 'admin')
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{ route('admin.users.list') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-icon fa fa-cog"></i>
                                        <span class="kt-menu__link-text">Usuários</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- end:: Aside Menu -->
            </div>
            <!-- end:: Aside -->
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                @include('_shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

                <!-- begin:: Content -->
                    <div class="kt-container kt-grid__item kt-grid__item--fluid">

                        @error('checkFail')
                        <div class="alert alert-solid-warning alert-bold fade show" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">{{ $message }}</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                        @enderror

                        @section('content')
                            This is a Body Content
                        @show

                    </div>
                    <!-- end:: Content -->
                </div>
            </div>

            @include("_shared.footer")
        </div>
    </div>
</div>

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->

<!-- end:: Page -->
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ config('app.root_route_group') }}/assets/plugins/plugins.bundle.js" type="text/javascript"></script>
<script src="{{ config('app.root_route_group') }}/assets/js/scripts.bundle.js" type="text/javascript"></script>
<script>
    var KTAppOptions = []
</script>
<!--end::Global Theme Bundle -->
@section('script')

@show

</body>

</html>
