@extends('_shared.layoutCommon')

@section('page-title', trans('pages.title.Login'))

@section('style')
    <style>
            /*.italy-bg{*/
            /*    background: rgb(0,140,69);*/
            /*    background: linear-gradient(90deg, rgba(0,140,69,1) 0%, rgba(255,255,255,1) 50%, rgba(205,33,42,1) 100%);*/
            /*}*/
        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control {
            border: 1px solid #74788d !important;
        }
    </style>
    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ config('app.root_route_group') }}/assets/css/login-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor italy-bg">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <h1><img src="/assets/images/logo-appmax.png" class="img-fluid mx-auto" alt="{{ trans('common.AppMax Invenotry System') }}" ></h1>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">{{ trans('common.Welcome to AppMax Invenotry System') }}</h3>
                            </div>
                            <form class="kt-form" id="frmLogin" method="post" action="{{ route('admin.auth.login.confirm') }}">
                                {{ csrf_field() }}

                                @error('loginFail')
                                <div class="danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <input name="email" class="form-control" type="text" placeholder="{{ trans('auth.Email') }}" autocomplete="off">
                                    @error('email')
                                    <span class="d-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" class="form-control" type="password" placeholder="{{ trans('auth.Password') }}">
                                    @error('password')
                                    <span class="d-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="kt-login__actions">
                                    <button id="btnSubmit" class="btn btn-brand btn-pill kt-login__btn-primary btn-success">{{ trans('auth.Sign In') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ config('app.root_route_group') }}/assets/js/login.js"></script>
@endsection

