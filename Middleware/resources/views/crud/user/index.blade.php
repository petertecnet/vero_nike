@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">Usuários
						<a href="{{route('users.create') }}"><button type="button"
								class="btn bg-secundary  mb-0  mt-md-n12 mt-lg-0 float-right">
								<i class="material-icons text-white position-relative text-md pe-2">add</i>
								Novo</button></a></p>

					</div>
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
                            <form action="users" method="GET">
                                @include('crud.user.search')
                            </form>
							<div class="col-md-12">
							{{ $cads->links('vendor.pagination.custom')}}
						</div>


                                    @if(count($users) == 0 && $username)
                                        <br><br><br><div class="col-md-4">
                                            <div class="alert alert-danger" role="alert">
                                                    <h4 align="center" style="font-weight: bold;">Nenhum usuário encontrado</h4>
                                            </div>
                                        </div>
                                    @else
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nome</th>
										<th scope="col">Email</th>
										<th scope="col">Criado em</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $cad)
									<tr>
										<td>{{ $cad->id }} </td>
										<td>{{ $cad->name }} </td>
										<td>{{ $cad->email }} </td>
										<td>{{ $cad->created_at}} </td>
										<td>
											<div class="btn-group">
												<a class="btn btn-light btn-sm" rel="tooltip" title="editar" href="{{ route('users.edit', $cad->id) }}">
													<i class="material-icons">edit</i>
												</a>
												<a class="btn btn-light btn-sm" rel="tooltip" title="Detalhar" href="{{ route('users.show', $cad->id) }}">
													<i class="material-icons">visibility</i>
												</a>
											
													
												<a class="btn btn-light btn-sm" rel="tooltip" title="ocultar Usuário" href="#popup_vero_delete_users{{($cad->id)}}">
													<i class="material-icons">delete</i>
												</a>

												<div id="popup_vero_delete_users{{($cad->id)}}" class="overlay">
													<div class="popup">
														<p id="hello_admin">Olá! {{ Auth::user()->name }}</p>
														<p id="delete_user">Tem certeza que deseja ocultar o usuário: <strong id="usuário_excluir">{{ $cad->name }}</strong>?</p>
														<form  action="{{ route('users.destroy', $cad->id) }}" method="POST">
															<input type="hidden" name="_method" value="DELETE" />
															<input type="hidden" name="_token" value="{{csrf_token()}}" />
															<center>
																<div id="div_delete">
																	<button id="button_excluir" type="submit" rel="tooltip" title="Excluir usuário" class="btn btn-light btn-sm">
																		Excluir Usuário 
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
									@endforeach
                                    @endif
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

@endsection