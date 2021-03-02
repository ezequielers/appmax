@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Edit Users'))

@section('content')
    <!--Begin::Row-->
    <div class="row">
        <div class="col-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">{{ trans('common.Products') }}</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.list') }}" class="nav-link active">
                                    {{ trans('common.Back') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form id="frmEdit" method="post" action="{{
                    $isEdit ? route('admin.products.update', ['id' => $product->pro_id]) : route('admin.products.store') }}">
                    {{ csrf_field() }}

                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>{{ trans('common.Product SKU') }}</label>
                                    <input type="text" name="pro_sku" readonly class="form-control" placeholder="{{ trans('common.Product SKU') }}" value="{{ $product->pro_sku }}">
                                    @error('pro_sku')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('common.Product Name') }}</label>
                                    <input type="text" name="pro_name" class="form-control" placeholder="{{ trans('common.Product Name') }}" value="{{ $product->pro_name }}">
                                    @error('pro_name')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ trans('common.Product Description') }}</label>
                                    <textarea name="pro_description" class="form-control" rows="5" placeholder="{{ trans('common.Product Description') }}">{{ $product->pro_description }}</textarea>
                                    @error('pro_description')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('common.Product Price') }}</label>
                                    <input type="text" name="pro_price" class="form-control" placeholder="{{ trans('common.Product Price') }}" value="{{ $product->pro_price }}">
                                    @error('pro_price')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('common.Product Amount') }}</label>
                                    <input type="number" name="pro_amount" min="1" max="9999" class="form-control" placeholder="{{ trans('common.Product Amount') }}" value="{{ $product->pro_amount }}">
                                    @error('pro_amount')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('common.Active') }}</label>
                                    <select class="form-control" name="pro_status">
                                        <option value="1" {{ $product->pro_status == 1 ? "selected" : "" }}>{{ trans('common.Yes') }}</option>
                                        <option value="0" {{ $product->pro_status == 0 ? "selected" : "" }}>{{ trans('common.No') }}</option>
                                    </select>
                                    @error('pro_active')
                                    <span class="d-block text=danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-brand">{{ trans('common.Submit') }}</button>
                            <a href="{{ route('admin.products.list') }}" class="btn btn-secondary">{{ trans('common.Cancel') }}</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!--End::Row-->
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous"></script>
    <script src="{{ config('app.root_route_group') }}/assets/js/views/products.js"></script>
@endsection
