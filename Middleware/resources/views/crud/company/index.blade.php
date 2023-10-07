@extends('layouts.single')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">Empresas
						<a href="{{ route('companies.create') }}"><button type="button" class="btn bg-secundary mb-0  mt-md-n9 mt-lg-0 float-right">
							<i class="material-icons text-primary position-relative text-md pe-2">add</i>
							Novo
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="">
							@include('layouts.alerts')
							<form action="companies" method="GET">
								@include('crud.company.search')
							</form>
						</div>
						<div class="col-md-12">
							{{ $cads->links('vendor.pagination.custom')}}
						</div>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Nome</th>
									<th scope="col">Status</th>
									<th scope="col">CNPJ</th>
									<th scope="col">Criando em</th>
									<th style="width:1px; text-align:center;">Ações</th>
								</tr>
							</thead>
							<tbody>

								@forelse($cads as $cad)

									<tr>
										<td>{{ $cad->id }} </td>
										<td>{{ $cad->name }} </td>
										<td>{{ $cad->status_name }} </td>
										<td>{{ $cad->CNPJ}} </td>
										<td>{{ $cad->created_at }} </td>
										<td>
											<div class="btn-group">

	@if( Auth::user()->HasPermission('company_edit'))
												<a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('companies.edit', $cad->id) }}">
													<i class="material-icons">edit</i>
												</a>
                                                @endif
												<a class="btn btn-light btn-sm btn-success" rel="tooltip" title="Ver" href="{{ route('companies.show', $cad->id) }}">
													<i class="material-icons">visibility</i>
												</a>

												<a class="btn btn-light btn-sm" rel="tooltip" title="Deletar" href="#popup_del{{($cad->id)}}">
													<i class="material-icons">delete</i>
												</a>
												<div id="popup_del{{($cad->id)}}" class="overlay">
													<div class="col-md-6">
														<div class="card cardpopup">
															<div class="card-body">
																<p class="text-center">Olá! {{ Auth::user()->name }}</p>
																<p class="text-center">Tem certeza que deseja deletar o cadastro: <strong class="text-primary">{{ $cad->name }}</strong>?</p>
																<form  action="{{ route('companies.destroy', $cad->id) }}" method="POST">
																	<input type="hidden" name="_method" value="DELETE">
																	<input type="hidden" name="_token" value="{{csrf_token()}}">
																	<div id="div_delete">
																		<button id="button_excluir" type="submit" rel="tooltip" title="Excluir" class="btn btn-light btn-sm">
																		Excluir
																		</button>
																		<p id="button_voltar" onclick="history.go(-1);"type="submit" rel="tooltip" title="Voltar ao sistema" class="btn btn-light btn-sm">
																			Cancelar
																		</p>
																	</div>
																<form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>

								@empty

									<tr>
										<td colspan="6" class="text-center text-muted text-gray">Nenhum usuário encontrado</td>
									</tr>

								@endforelse

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
