@extends('layouts.single')
@section('content')



<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">Clientes
                        <a href="{{route('company.customer.create', $company_id) }}"><button type="button"
                                class="btn bg-secundary mb-0  mt-md-n9 mt-lg-0 float-right">
                                <i class="material-icons text-white position-relative text-md pe-2">add</i>
                                Novo</button></a></p>

                                </div>
                    </div>
                    </div>
                    </div>
                    </div>




                    <div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                </div>

                <div class="card-body">

                    <div class="">
                        @include('layouts.alerts')
                        </div>
                        <form action="customers" method="GET">
                        </form>
                            <div class="col-md-12">
                            {{ $cads->links('vendor.pagination.custom')}}
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Criando em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cads as $cad)

                                <tr>
                                    <td>{{ $cad->id }} </td>
                                    <td>{{ $cad->name }} </td>
                                    <td>{{ $cad->getCompanyNameAttribute() }} </td>
                                    <td>{{ $cad->created_at }} </td>
                                    <td>
                                    <div class="btn-group">
												<a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('company.customer.edit', $cad->id) }}">
													<i class="material-icons">edit</i>
												</a>
												<a class="btn btn-light btn-sm btn-success" rel="tooltip" title="Ver" href="{{ route('company.customer.show', $cad->id) }}">
													<i class="material-icons">visibility</i>
												</a>
												<form action="{{ route('company.customer.destroy', $cad->id) }}" method="POST">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													<button type="submit" rel="tooltip" title="Excluir" class="btn btn-light btn-sm btn-danger">
														<i class="material-icons">close</i>
													</button>
												</form>
											</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{ $cads->links('vendor.pagination.custom')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endsection
