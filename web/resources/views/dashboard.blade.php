@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Dashboard'))

@section('content')
    <!--Begin::Row-->
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5">{{ trans('common.Welcome to AppMax Invenotry System') }}</h2>
        </div>

        <div class="col-12 col-md-6 mb-5">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Quantidade de Produtos Ativos
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div class="kt-widget20">
                        <div class="kt-widget20__content kt-portlet__space-x">
                            <span class="kt-widget20__number kt-font-danger">{{ $gettAllWithActive->count() }}</span>
                        </div>
                        <div class="kt-widget20__chart" style="height:130px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="kt_chart_bandwidth2" width="427" height="130" class="chartjs-render-monitor" style="display: block; width: 427px; height: 130px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-6 mb-5">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Quantidade de Produtos com Estoque abaixo de 100
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div class="kt-widget20">
                        <div class="kt-widget20__content kt-portlet__space-x">
                            <span class="kt-widget20__number kt-font-danger">{{ $getAllWithLowStock->count() }}</span>
                        </div>
                        <div class="kt-widget20__chart" style="height:130px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="kt_chart_bandwidth2" width="427" height="130" class="chartjs-render-monitor" style="display: block; width: 427px; height: 130px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-5">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Últimos 4 produtos cadastrados
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded">
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                                <thead>
                                <tr class="text-left">
                                    <th scope="col">{{ trans('common.Product SKU') }}</th>
                                    <th scope="col">{{ trans('common.Product Name') }}</th>
                                    <th scope="col" class="text-center">{{ trans('common.Product Amount') }}</th>
                                    <th scope="col" class="text-center">{{ trans('common.Status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getLastFiveProducts as $product)
                                    <tr>
                                        <td scope="row">
                                            {{ $product->pro_sku }}
                                        </td>
                                        <td>
                                            {{ $product->pro_name }}
                                        </td>
                                        <td class="text-center">
                                            <span class=" {{ ($product->pro_amount < 100) ? 'badge badge-danger' : 'badge badge-success' }} "> {{ $product->pro_amount }} </span>
                                        </td>
                                        <td class="text-center">
                                            @if($product->pro_status)
                                                <span class="badge badge-success">Ativo</span>
                                            @else
                                                <span class="badge badge-danger">Inativo</span>
                                            @endif
                                        </td>
                                    </tr>
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

@push('script')
    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
    <script>
    </script>
@endpush
