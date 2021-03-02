@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Stock Reports'))

@section('content')
    <div class="row row-no-padding row-col-separator-lg bg-white mb-5">
        <div class="col-12 col-md-3">
            <div class="kt-widget24">
                <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                        <h4 class="kt-widget24__title">
                            Produtos Cadastrados
                        </h4>
                        <span class="kt-widget24__desc">
                            Estoque abaixo de 100
                        </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                        {{ $getAllLowStock->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Produtos com Estoque abaixo de 100
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
                                @foreach($getAllLowStock as $product)
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
