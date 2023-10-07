@extends('layouts.single')
@section('content')
<div class="content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
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
									<th scope="col" style="width:150px;">Data</th>
									<th scope="col">Autor</th>
									<th class="text-center" style="width:1px;">Ações</th>
								</tr>
							</thead>
							<tbody>

								@forelse($logs as $log)
									<tr>
										<td>{{ $log->date }}</td>
										<td>{{ $log->user->name }}
										<td>
											<div class="btn-group">
												<a class="btn btn-light btn-sm btn-danger" rel="tooltip" title="Expurgar" href="{{ route($purgeRoute, [$module->key, $log->id]) }}">
													<i class="material-icons">delete</i>
												</a>
											</div>
										</td>
									</tr>

								@empty

									<tr><td colspan="3" class="text-center text-muted text-gray">Nenhum registro encontrado</td></tr>
								
								@endforelse
							
							</tbody>
						</table>
						<div class="col-md-12">
							{{ $logs->links('vendor.pagination.custom') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
