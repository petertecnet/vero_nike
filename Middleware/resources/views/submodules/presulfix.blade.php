@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configurar Submódulo Processador: Prefixo e Sulfixo
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
									'placeholder'	=> 'Selecione um dos campos disponíveis',
								])

								@include('layouts.form.string', [
									'label'			=> 'Prefixo:',
									'field'			=> 'prefix',
									'value'			=> @$company->config->{$module->key}->processor[$index]->from,
									'columns'		=> 12,
								])

								@include('layouts.form.string', [
									'label'			=> 'Sulfixo:',
									'field'			=> 'sulfix',
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
