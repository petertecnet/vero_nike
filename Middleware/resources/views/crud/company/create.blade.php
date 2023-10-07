@extends('layouts.single')

@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-header-primary">
							Novo Cadastro
							<a href="{{route('companies.index') }}">
								<button type="button" class="btn btn-success tet-white float-right">
									<i class="fa fa-arrow-left "></i> VOLTAR
								</button>
							</a>
						</div>
						<div class="card-body">

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
							<strong>Formulario para novo cadastro</strong>
						</div>
						<div class="card-body">

						@include('layouts.alerts')
							<form action="{{ route('companies.store') }}" method="post">
								@method('POST')
								@include('crud.company.form')
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
