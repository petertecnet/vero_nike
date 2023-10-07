@extends('layouts.single')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				
				@include('layouts.alerts')
				
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<a class="btn btn-success text-white float-right" href="{{ route('company.export.generate', [$module->key]) }}">
							<i class="fa fa-cog"></i> Gerar Nova Exportação
						</a>
						<h4 class="m-0 pt-3">Lista de Exportações: {{ $module->name }}</h4>
					</div>
					<div class="card-body">
						<table id="tableData" class="table table-hover">
							<thead>
								<tr>
									<th scope="col" style="width:150px;">Data</th>
									<th style="">Autor</th>
									<th style="width:1px;">Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									@forelse ($logs as $log)
										
										<tr>
											<td>{{ $log->date_string }}</td>
											<td>{{ $log->user->name }}</td>
											<td>
												<div class="btn-group">
													<a
														class="btn btn-light btn-sm btn-warning"
														rel="tooltip"
														title="Download"
														href="{{ route('company.export.download', [$log->id]) }}"
													>
														<i class="material-icons">download</i>
													</a>
												</div>
											</td>
										</tr>

									@empty

										<tr><td colspan="3" class="text-muted text-gray text-center">Nenhum download disponível</td></tr>

									@endforelse

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
