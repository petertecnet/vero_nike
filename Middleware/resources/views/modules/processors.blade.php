@extends('layouts.single')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">Submódulos Processadores:
						<a class="btn btn-success tet-white float-right" href="{{route('company.configuration')}}">
							<i class="fa fa-arrow-left "></i> VOLTAR
						</a>
					</div>
				</div>
				@include('layouts.alerts')
				<br />
				<div class="card">
					<div class="card-header card-header-primary">
						<div class="dropdown float-right">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Adicionar Processadores:
							</button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
								@foreach($submodules as $submodule)
									<a class="dropdown-item" href="{{ route('company.processor.config', [$module->key, $submodule->key]) }}">
										{{ $submodule->name }}
									</a>
								@endforeach
							</div>
						</div>
						<h4><i class="fa" aria-hidden="true"></i> Lista de Processadores</h4>
					</div>
					<div class="card-body">
						<table id="tableData" class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Nome</th>
									<th style="">Preview</th>
									<th style="width:1px;">Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									@forelse ((array) @$company->config->{$module->key}->processor as $index => $processor)
										<tr>
											<td>{{ $submodules[$processor->submodule]->name }}</td>
											<td>{!! $submodules[$processor->submodule]->GetPreview($processor, $module) !!}</td>
											<td>
												<div class="btn-group">
													<a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('company.processor.config', [$module->key, $submodules[$processor->submodule]->key, $index]) }}"><i class="material-icons">edit</i></a>


													

	
													<a class="btn btn-light btn-sm" rel="tooltip" title="ocultar Usuário" href="#popup_vero_delete_users{{($index)}}">
													<i class="material-icons">delete</i>
												</a>

												<div id="popup_vero_delete_users{{($index)}}" class="overlay">
													<div class="popup">
												     	<p id="hello_admin">Deseja realmente excluir?</p>
														<form  action="{{ route('company.processor.destroy', [$module->key, $index]) }}" method="POST">
														@csrf
                                                        @method('PUT')
															<center>
																<div id="div_delete">
																	<button id="button_excluir" type="submit" rel="tooltip" title="Excluir usuário" class="btn btn-light btn-sm">
																		Excluir processador
																	</button>
																
																	<p id="button_voltar" onclick="history.go(-1);" type="submit" rel="tooltip" title="Voltar ao sistema" class="btn btn-light btn-sm">
																		Voltar a plataforma
																	</p>
																</div>
															</center>
														</form>
													</div>
												</div>
												
												</div>
											</td>
										</tr>

									@empty

										<tr><td colspan="2" class="text-muted text-gray text-center">Nenhum processador cadastrado</td></tr>

									@endforelse

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tableData").tablesorter();
    });
</script>

@endsection
