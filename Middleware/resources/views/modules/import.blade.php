@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				
				@include('layouts.alerts')
				
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<h4 class="m-0 pt-3">Importação: {{ $module->name }}</h4>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<input type="hidden" name="send" value="ok" />
							@include($submodule->views['process'])
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-block btn-success btn-lg">
										Importar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection