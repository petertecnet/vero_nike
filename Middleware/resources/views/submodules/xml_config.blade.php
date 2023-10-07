@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configurar Submódulo Connector: XML
						<a href="{{route('company.connector', [$module->key])}}">
							<button type="button" class="btn btn-success tet-white float-right">
								<i class="fa fa-arrow-left "></i> VOLTAR
							</button>
						</a>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<div class="row">

								@include('layouts.form.string', [
									'label'			=> 'Nó Raiz',
									'field'			=> 'root',
									'value'			=> @$company->config->{$module->key}->connector->root,
									'columns'		=> 12,
								])
									
							</div>
							<hr />
							<h4 class="col-md-12">Configuração dos nomes dos nós</h4>
							<div class="row">

								@foreach ($module->fields as $field)
								
									@include('layouts.form.string', [
										'label'			=> $field['name'],
										'field'			=> 'nodes[' . $field['field'] . ']',
										'value'			=> @$company->config->{$module->key}->connector->nodes->{$field['field']},
										'columns'		=> 12,
									])

								@endforeach

							</div>
							<hr />
							<div class="row">

								@include('layouts.form.select', [
									'label'			=> 'Campo Chave',
									'field'			=> 'column',
									'value'			=> @$company->config->{$module->key}->connector->column,
									'columns'		=> 12,
									'options'		=> $module->GetFieldsAsOptionValue(),
								])

								@include('layouts.form.select', [
									'label'			=> 'Campo Chave',
									'field'			=> 'column',
									'value'			=> @$company->config->{$module->key}->connector->column,
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
