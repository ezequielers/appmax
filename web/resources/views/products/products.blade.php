@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Products'))

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
                                <a href="{{ route('admin.products.create') }}" class="nav-link active">
                                    {{ trans('common.Add Product') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" id="csrf_token" name="csrf_token" content="{{ csrf_token() }}" />
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('common.Product SKU') }}</th>
                                    <th>{{ trans('common.Product Name') }}</th>
                                    <th>{{ trans('common.Product Price') }}</th>
                                    <th>{{ trans('common.Product Amount') }}</th>
                                    <th>{{ trans('common.Product Origin') }}</th>
                                    <th>{{ trans('common.Active') }}</th>
                                    <th>{{ trans('common.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->pro_id }}</th>
                                        <td>{{ $product->pro_sku }}</td>
                                        <td>{{ $product->pro_name }}</td>
                                        <td>R$ {{ number_format($product->pro_price, 2, ',', '.') }}</td>
                                        <td>{{ $product->pro_amount }}</td>
                                        <td>{{ trans('common.' . $product->pro_origin) }}</td>
                                        <td>{{ $product->pro_status == '1' ? trans('common.Active') : trans('common.Inactive') }}</td>
                                        <td>
                                            <!--Botão de Decrementar-->
                                            <a href="javascript:;" data-href="{{ route('admin.products.decrement', ['id' => $product->pro_id]) }}"
                                               title='{{ trans('Decrement') }}' id="lnkDecrement" class="mx-2"> <i class="fas fa-minus-circle"></i> </a>
                                            <!--Botão de Editar-->
                                            <a href="{{ route('admin.products.edit', ['id' => $product->pro_id]) }}"
                                               title='{{ trans('Edit') }}' class="mx-2"> <i class="fas fa-edit"></i> </a>
                                            <!--Botão de Deletar-->
                                            <a href="javascript:void(0);" data-href="{{ route('admin.products.delete', ['id' => $product->pro_id]) }}"
                                               title='{{ trans('Delete') }}'  id="lnkDelete" class="mx-2"> <i class="far fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <span class="text-danger d-block text-center kt-font-boldest">{{ trans('common.No records found') }}</span>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--End::Row-->
@endsection

@section('script')
    <script src="/assets/js/sweetalert2.all.min.js"></script>
    <script>
        $('document').ready(function () {

            $('a[id*="lnkDecrement"]').click(function (e) {
                var me = $(this);
                swal({
                    title: 'Baixar este item?',
                    text: "Você está baixando sua quantidade em estoque!",
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                        id: 'amount'
                    },
                    inputPlaceholder: "Informe a quantidade",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Cancelar',
                    showLoaderOnConfirm: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Informe a quantidade!'
                        }
                    }
                }).then((result) => {
                    if (result.value) {

                        e.preventDefault();

                        jQuery.ajax({
                            data: {
                                _token: '{{ csrf_token() }}',
                                pro_amount: result.value
                            },
                            url: me.data('href'),
                            type: 'POST',
                            dataType: 'json',

                        }).done(function(data) {
                            const toast = swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 5000
                            });

                            toast({
                                icon: data.code === '200' ? 'success' : 'warning',
                                title: data.message
                            });

                            if(data.code === 200) {
                                location.reload(true);
                            }
                        });
                    }
                });
            });

            $('a[id*="lnkDelete"]').click(function () {
                let _href = $(this).data('href');
                swal.fire({
                    title: '{{ trans('common.Attention') }}',
                    text: '{{ trans('common.Are you sure you want to delete the :object?', ['object' => trans('common.Product')]) }}',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{ trans('common.Yes') }}',
                    cancelButtonText: '{{ trans('common.No') }}'
                }).then(function(result) {
                    if (result.value) {
                        window.location.href = _href;
                    }
                });
            })
        })
        @if (Session::has('user_error'))
        swal.fire({
            title: 'Ops',
            text: '{{ Session::get('product_error') }}',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'OK',
            confirmButtonClass: 'btn btn-brand'
        });
        @endif
    </script>
@endsection
