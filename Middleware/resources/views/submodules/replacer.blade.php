@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configurar Submódulo Processador: Modificador de Texto
						<a href="{{route('company.processor', [$module->key])}}">
							<button type="button" class="btn btn-success tet-white float-right">
								<i class="fa fa-arrow-left "></i> VOLTAR
							</button>
						</a>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<div class="row">

								@include('layouts.form.select', [
									'label'			=> 'Coluna',
									'field'			=> 'column',
									'value'			=> @$company->config->{$module->key}->connector->column,
									'columns'		=> 12,
									'options'		=> $module->GetFieldsAsOptionValue(),
								])

								@include('layouts.form.checkbox', [
									'label'			=> 'Ignorar valor inexistente',
									'field'			=> 'ignore_blank',
									'value'			=> 'true',
									'columns'		=> 12,
									'checked'		=> @$company->config->{$module->key}->processor[$index]->ignore_blank === true,
								])

								@include('layouts.form.string', [
									'label'			=> 'De:',
									'field'			=> 'from',
									'value'			=> @$company->config->{$module->key}->processor[$index]->from,
									'columns'		=> 12,
								])

								@include('layouts.form.string', [
									'label'			=> 'Para:',
									'field'			=> 'to',
									'value'			=> @$company->config->{$module->key}->processor[$index]->to,
									'columns'		=> 12,
								])

							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary float-right">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
