@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Edit Users'))

@section('content')
    <!--Begin::Row-->
    <div class="row">
        <div class="col-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">{{ trans('common.Users') }}</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.list') }}" class="nav-link active">
                                    {{ trans('common.Back') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                @if ($isEdit)
                    <form id="frmEdit" method="post" action="{{ route('admin.users.update', ['id' => $user->use_id]) }}">
                        @else
                            <form id="frmEdit" method="post" action="{{ route('admin.users.store') }}">
                                @endif
                                {{ csrf_field() }}

                                <div class="kt-portlet__body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>{{ trans('common.Users Name') }}</label>
                                                <input type="text" name="use_name" class="form-control" placeholder="{{ trans('common.Users Name') }}" value="{{ $user->use_name }}">
                                                @error('use_name')
                                                <span class="d-block text=danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>{{ trans('common.Email') }}</label>
                                                <input type="text" name="use_email" class="form-control" placeholder="{{ trans('common.Email') }}" value="{{ $user->use_email }}">
                                                @error('use_email')
                                                <span class="d-block text=danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>{{ trans('common.Password') }}</label>
                                                <input type="password" name="use_password" class="form-control" placeholder="{{ trans('common.Password') }}" value="{{ $user->use_password }}">
                                                @error('use_password')
                                                <span class="d-block text=danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>{{ trans('common.Type') }}</label>
                                                <select class="form-control" name="use_type">
                                                    <option value="admin">{{ trans('common.Admin') }}</option>
                                                    <option value="user">{{ trans('common.User') }}</option>
                                                </select>
                                                @error('use_type')
                                                <span class="d-block text=danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>{{ trans('common.Active') }}</label>
                                                <select class="form-control" name="use_active">
                                                    <option value="1">{{ trans('common.Yes') }}</option>
                                                    <option value="0">{{ trans('common.No') }}</option>
                                                </select>
                                                @error('use_active')
                                                <span class="d-block text=danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <button type="submit" class="btn btn-brand">{{ trans('common.Submit') }}</button>
                                        <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">{{ trans('common.Cancel') }}</a>
                                    </div>
                                </div>

                            </form>
            </div>

        </div>
    </div>
    <!--End::Row-->
@endsection

@section('script')
    <script src="{{ config('app.root_route_group') }}/assets/js/views/users.js"></script>
@endsection
