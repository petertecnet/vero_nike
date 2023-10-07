@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<a href="{{route('profiles.create') }}" class="btn bg-primary mb-0  mt-md-n9 mt-lg-0 float-right">
							<i class="material-icons text-white position-relative text-md pe-2">add</i>
							Novo
						</a>
						<h4>Perfis</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-12">
				<div class="card">


					<div class="card-body">

						<div class="table-responsive">
							@include('layouts.alerts')
							<div class="col-md-12">
							{{ $profiles->links('vendor.pagination.custom')}}
						</div>
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nome</th>
										<th scope="col">Permições</th>
										<th scope="col">Criado em</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									@foreach($profiles as $cad)
									<tr>
										<td>{{ $cad->id }} </td>
										<td>{{ $cad->name }} </td>
										<td>{{ $cad->permission_names }} </td>
										<td>{{ $cad->created_at}} </td>
										<td>
											<div class="btn-group">
												<a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('profiles.edit', $cad->id) }}">
													<i class="material-icons">edit</i>
												</a>

												<a class="btn btn-light btn-sm btn-danger" rel="tooltip" title="Deletar" href="#popup_del{{($cad->id)}}">
														<i class="material-icons">delete</i>
													</a>
														<div id="popup_del{{($cad->id)}}" class="overlay">

														<div class="col-md-6">
													<div class="card cardpopup">
													<div class="card-body">

													<p class="text-center">Olá! {{ Auth::user()->name }}</p>
													<p class="text-center">Tem certeza que deseja deletar o cadastro: <strong class="text-primary">{{ $cad->name }}</strong>?</p>
													<form  action="{{ route('profiles.destroy', $cad->id) }}" method="POST">
														<input type="hidden" name="_method" value="DELETE">
														<input type="hidden" name="_token" value="{{csrf_token()}}">
													<div id="div_delete">
														<button id="button_excluir" type="submit" rel="tooltip" title="Excluir" class="btn btn-light btn-sm">
															Excluir
														</button>
														<p id="button_voltar"
														onclick="history.go(-1);"type="submit" rel="tooltip" title="Voltar ao sistema" class="btn btn-light btn-sm">
														Cancelar
														</p>
														<form>
														</div>

														</div>
														</div>
														</div>
														</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="col-md-12">
							{{ $profiles->links('vendor.pagination.custom')}}
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
