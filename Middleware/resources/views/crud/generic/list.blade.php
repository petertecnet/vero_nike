@extends('layouts.single')
@section('content')
@php

	$listColumns = collect($module->fields)->filter(function($item) {return $item['showOnList'];});

@endphp

<div class="content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						
						@if (isset($newItem))
						
							<a href="{{ $newItem['url'] }}" class="btn bg-secundary mb-0  mt-md-n9 mt-lg-0 float-right">
								<i class="material-icons text-white position-relative text-md pe-2">add</i>
								{!! $newItem['label'] !!}
							</a>
						
						@endif
						
						<h4>{{ $title }}</h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="">
							@include('layouts.alerts')
						</div>
						<table class="table table-hover">
							<thead>
								<tr>
									@foreach ($listColumns as $column)
										<th scope="col">{!! $column['name'] !!}</th>
									@endforeach
									<th class="text-center" style="width:1px;">Ações</th>
								</tr>
							</thead>
							<tbody>

								@forelse($entities as $entity)
									<tr>
										@foreach ($listColumns as $column)
											@switch ($column['type'])

												@case('date')
													<td>{{ date('d/m/Y', strtotime($entity->{$column['field']})) }} </td>
													@break

												@default
													<td>{{ $entity->{$column['field']} }} </td>
													@break

											@endswitch
										@endforeach
										<td>
											<div class="btn-group">
												<a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('crud.edit', [$module->key, $entity->id]) }}">
													<i class="material-icons">edit</i>
												</a>
												<a class="btn btn-light btn-sm" rel="tooltip" title="Deletar" href="#popup_del_{{ $entity->id }}">
													<i class="material-icons">delete</i>
												</a>
												<div id="popup_del_{{ $entity->id }}" class="overlay">
													<div class="col-md-6">
														<div class="card cardpopup">
															<div class="card-body">
																<p class="text-center">Olá! {{ Auth::user()->name }}</p>
																<p class="text-center">Tem certeza que deseja deletar o registro: <strong class="text-primary">{{ $entity->id }}</strong>?</p>
																<form  action="{{ route('crud.destroy', [$module->key, $entity->id]) }}" method="POST">
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

									<tr><td colspan="{{ $listColumns->count() + 1 }}" class="text-center text-muted text-gray">Nenhum registro encontrado</td></tr>
								
								@endforelse
							
							</tbody>
						</table>
						<div class="col-md-12">
							{{ $entities->links('vendor.pagination.custom') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
