@extends('layouts.single')
@section('content')

<style type="text-css">

.border-gray {
	border-color:#f2f2f2 !important;
}

</style>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configuração do Submódulo: Banco de dados
						<a href="{{route('company.connector', [$module->key])}}">
							<button type="button" class="btn btn-success tet-white float-right">
								<i class="fa fa-arrow-left "></i> VOLTAR
							</button>
						</a>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<div class="row border border-gray m-3">

								<h4 class="col-md-12 mt-3">Configuração da Query a Ser Executada</h4>

								@foreach ($module->fields as $field)
								
									@include('layouts.form.string', [
										'label' => 'SELECT FIELD',
										'field' => "select[{$field['field']}]",
										'value' => @$company->config->{$module->key}->connector->select->{$field['field']},
										'columns' => 8,
									])
									<div class="col-md-4 m-0" style="height:56px; line-height:56px;">AS {{ $field['name'] }}</div>

								@endforeach

								@include('layouts.form.string', [
									'label'			=> 'FROM:',
									'field'			=> 'from',
									'value'			=> @$company->config->{$module->key}->connector->from,
									'columns'		=> 12,
								])

								@include('layouts.form.text', [
									'label'			=> 'JOIN:',
									'field'			=> 'join',
									'value'			=> @$company->config->{$module->key}->connector->join,
									'columns'		=> 12,
								])

								@include('layouts.form.text', [
									'label'			=> 'WHERE:',
									'field'			=> 'where',
									'value'			=> @$company->config->{$module->key}->connector->where,
									'columns'		=> 12,
								])

								@include('layouts.form.text', [
									'label'			=> 'APPEND:',
									'field'			=> 'append',
									'value'			=> @$company->config->{$module->key}->connector->append,
									'columns'		=> 12,
								])

							</div>
							
							@include('layouts.form.select', [
								'label'			=> 'Campo Chave:',
								'field'			=> 'column',
								'value'			=> @$company->config->{$module->key}->connector->column,
								'columns'		=> 12,
								'options'		=> $module->GetFieldsAsOptionValue(),
							])

							<div class="row border border-gray m-3">

								<h4 class="col-md-12 mt-3">Configuração de Acesso ao Banco de Dados</h4>

									@include('layouts.form.select', [
										'label'			=> 'Tipo de Banco de Dados:',
										'field'			=> 'type',
										'value'			=> @$company->config->{$module->key}->connector->type,
										'columns'		=> 12,
										'options'		=> $submodule->GetDatabasesAsLabelValue(),
									])

									@include('layouts.form.string', [
										'label'			=> 'Nome do Banco de Dados ',
										'field'			=> 'database',
										'value'			=> @$company->config->{$module->key}->connector->database,
										'columns'		=> 12,
									])

									@include('layouts.form.string', [
										'label'			=> 'Host:',
										'field'			=> 'host',
										'value'			=> @$company->config->{$module->key}->connector->host,
										'columns'		=> 12,
									])
									
									@include('layouts.form.string', [
										'label'			=> 'Usuário:',
										'field'			=> 'user',
										'value'			=> @$company->config->{$module->key}->connector->user,
										'columns'		=> 12,
									])
									
									@include('layouts.form.string', [
										'label'			=> 'Senha:',
										'field'			=> 'password',
										'value'			=> @$company->config->{$module->key}->connector->password,
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
