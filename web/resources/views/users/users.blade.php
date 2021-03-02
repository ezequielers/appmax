@extends('_shared.layoutSite', ['breadcrumbs' => $breadcrumbs])

@section('page-title', trans('pages.title.Users'))

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
                                <a href="{{ route('admin.users.create') }}" class="nav-link active">
                                    {{ trans('common.Add User') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('common.Users Name') }}</th>
                                    <th>{{ trans('common.Email') }}</th>
                                    <th>{{ trans('common.Active') }}</th>
                                    <th>{{ trans('common.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->use_id }}</th>
                                        <td>{{ $user->use_name }}</td>
                                        <td>{{ $user->use_email }}</td>
                                        @if($user->use_active == 1)
                                            <td>Ativo</td>
                                        @else
                                            <td>Inativo</td>
                                        @endif
                                        <td>
                                            <!--Botão de Editar-->
                                            <a href="{{ route('admin.users.edit', ['id' => $user->use_id]) }}" class="mx-2"> <i class="fas fa-edit"></i> </a>
                                            <!--Botão de Deletar-->
                                            @if($user->use_id != Session::get('_user_')['use_id'] )
                                                <a href="javascript:void(0);" data-href="{{ route('admin.users.delete', ['id' => $user->use_id]) }}" id="lnkDelete" class="mx-2"> <i class="far fa-trash-alt"></i> </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
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
    <script>
        $('document').ready(function () {
            $('a[id*="lnkDelete"]').click(function () {
                let _href = $(this).data('href');
                swal.fire({
                    title: '{{ trans('common.Attention') }}',
                    text: '{{ trans('common.Are you sure you want to delete the :object?', ['object' => trans('common.User')]) }}',
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
            text: '{{ Session::get('user_error') }}',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'OK',
            confirmButtonClass: 'btn btn-brand'
        });
        @endif
    </script>
@endsection
