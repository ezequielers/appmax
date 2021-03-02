
<!-- begin:: Header -->
<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
    <div class="kt-container  kt-container--fluid ">

        <!-- begin: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
            <button class="kt-aside-toggler kt-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
                <ul class="kt-menu__nav ">
{{--                    <li--}}
{{--                        class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">--}}
{{--                        <a href="{{ route('admin.group.list') }}" class="kt-menu__link">--}}
{{--                            <span class="kt-menu__link-text">{{ trans('common.Groups') }}</span>--}}
{{--                            <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li--}}
{{--                        class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">--}}
{{--                        <a href="{{ route('admin.certificate.list') }}" class="kt-menu__link">--}}
{{--                            <span class="kt-menu__link-text">{{ trans('common.Certificates') }}</span>--}}
{{--                            <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @if (Session::get('_user_')['use_type'] == 'admin')
                        <li
                            class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">
                            <a href="{{ route('admin.users.list') }}" class="kt-menu__link">
                                <span class="kt-menu__link-text">{{ trans('common.Users') }}</span>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                            </a>
                        </li>
                    @endif
                    <li
                        class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">
                        <a href="{{ route('admin.products.list') }}" class="kt-menu__link">
                            <span class="kt-menu__link-text">{{ trans('common.Products') }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel"
                        data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-text">{{ trans('common.Reports') }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{ route('admin.reports.daily') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">{{ trans('common.Daily') }}</span>
                                    </a>
                                </li>
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{ route('admin.reports.stock') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">{{ trans('common.Stock') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: Header Menu -->

        <!-- begin:: Brand -->
        <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
            <a href="{{ route('admin.dashboard') }}" class="kt-header__brand-logo">
                <img src="{{ config('app.root_route_group') }}/assets/images/logo-appmax.png" class="img-fluid mx-auto" width="200" alt="{{ trans('common.AppMax Invenotry System') }}" />
            </a>
        </div>
        <!-- end:: Brand -->

        <!-- begin:: Header Topbar -->
        <div class="kt-header__topbar kt-grid__item">

            <!--begin: User bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-welcome kt-visible-desktop">{{ trans('common.Hi') }},</span>
                    <span class="kt-header__topbar-username kt-visible-desktop">{{ Session::get('_user_')['use_name'] }}</span>
                    <img alt="Pic" src="{{ config('app.root_route_group') }}/assets/images/no-user.jpg" />

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                    <div class="kt-notification">
                        <a href="javascript:void(0);" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    {{ trans('common.My Profile') }}
                                </div>
                                <div class="kt-notification__item-time">
                                    {{ trans('common.Account settings and more') }}
                                </div>
                            </div>
                        </a>

                        <div class="kt-notification__custom kt-space-between">
                            <a href="{{ route('admin.auth.logout') }}"
                               class="btn btn-label btn-label-brand btn-sm btn-bold">{{ trans('common.Sign Out') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: User bar -->

        </div>
        <!-- end:: Header Topbar -->
    </div>
</div>
<!-- end:: Header -->

