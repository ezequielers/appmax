@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Daily Reports'))

@section('content')
    <div class="row row-no-padding row-col-separator-lg bg-white mb-5">
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="kt-widget24">
                <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                        <h4 class="kt-widget24__title">
                            Produtos Cadastrados
                        </h4>
                        <span class="kt-widget24__desc">
                            vai Sistema
                        </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                        {{ $getSystemInsertedBetweenDate->count() }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="kt-widget24">
                <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                        <h4 class="kt-widget24__title">
                            Produtos Cadastrados
                        </h4>
                        <span class="kt-widget24__desc">
                            vai API
                        </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                        {{ $getApiInsertedBetweenDate->count() }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="kt-widget24">
                <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                        <h4 class="kt-widget24__title">
                            Produtos Cadastrados
                        </h4>
                        <span class="kt-widget24__desc">
                            Quantidade
                        </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                        {{ $getCreatedBetweenDate->count() }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="kt-widget24">
                <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                        <h4 class="kt-widget24__title">
                            Produtos Cadastrados
                        </h4>
                        <span class="kt-widget24__desc">
                            Deletados
                        </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                        {{ $getDeletedBetweenDate->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Produtos Cadastrados -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Produtos Cadastrados
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded">
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                                <thead>
                                <tr class="text-left">
                                    <th>{{ trans('common.Product SKU') }}</th>
                                    <th>{{ trans('common.Product Name') }}</th>
                                    <th>{{ trans('common.Product Price') }}</th>
                                    <th>{{ trans('common.Product Amount') }}</th>
                                    <th>{{ trans('common.Product Origin') }}</th>
                                    <th>{{ trans('common.Active') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getCreatedBetweenDate as $product)
                                    <td>{{ $product->pro_sku }}</td>
                                    <td>{{ $product->pro_name }}</td>
                                    <td>R$ {{ number_format($product->pro_price, 2, ',', '.') }}</td>
                                    <td>{{ $product->pro_amount }}</td>
                                    <td>{{ trans('common.' . $product->pro_origin) }}</td>
                                    <td>{{ $product->pro_status == '1' ? trans('common.Active') : trans('common.Inactive') }}</td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produtos Deletados -->
    <div class="row">
        <div class="col-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Produtos Deletados
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded">
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                                <thead>
                                <tr class="text-left">
                                    <th>{{ trans('common.Product SKU') }}</th>
                                    <th>{{ trans('common.Product Name') }}</th>
                                    <th>{{ trans('common.Product Price') }}</th>
                                    <th>{{ trans('common.Product Amount') }}</th>
                                    <th>{{ trans('common.Product Origin') }}</th>
                                    <th>{{ trans('common.Active') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getDeletedBetweenDate as $product)
                                    <td>{{ $product->pro_sku }}</td>
                                    <td>{{ $product->pro_name }}</td>
                                    <td>R$ {{ number_format($product->pro_price, 2, ',', '.') }}</td>
                                    <td>{{ $product->pro_amount }}</td>
                                    <td>{{ trans('common.' . $product->pro_origin) }}</td>
                                    <td>{{ $product->pro_status == '1' ? trans('common.Active') : trans('common.Inactive') }}</td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
