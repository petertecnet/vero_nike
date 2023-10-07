@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configurar Submódulo Processador: Remover Acentuação
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
									'label'			=> 'Coluna Modificada',
									'field'			=> 'column_destiny',
									'value'			=> @$company->config->{$module->key}->processor[$index]->column_destiny,
									'columns'		=> 12,
									'options'		=> $module->GetFieldsAsOptionValue(),
								])

								@include('layouts.form.checkbox', [
									'label'			=> 'Buscar apenas se a coluna a ser modificada estiver vazia',
									'field'			=> 'only_empty',
									'checked'		=> @$company->config->{$module->key}->processor[$index]->only_empty === true,
									'columns'		=> 12,
								])

								@include('layouts.form.string', [
									'label'			=> 'Expressão regular para extração:',
									'field'			=> 'regex',
									'value'			=> @$company->config->{$module->key}->processor[$index]->regex,
									'columns'		=> 12,
								])

								@include('layouts.form.select', [
									'label'			=> 'Coluna com os Dados Originais',
									'field'			=> 'column_original',
									'value'			=> @$company->config->{$module->key}->processor[$index]->column_original,
									'columns'		=> 12,
									'options'		=> $module->GetFieldsAsOptionValue(),
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
