@extends('layouts.single')
@section('content')

<style type="text/css">

	#Conectors_data_select.active {
		background-color:#1a5a1a;
	}

</style>

@php

	$hasCurrentModule = !is_null(@$company->config->{$module->key}->connector->submodule);

@endphp

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">Configurar Conector: {{$module->name}}</div>
				</div>
			</div>
		</div>
		<div class="row">
			
			@foreach ($submodules as $submodule)

				@php

					$isCurrentModule = @$company->config->{$module->key}->connector->submodule == $submodule->key

				@endphp

				<div class="col-lg-4 col-md-6 col-sm-6" title="{{ $submodule->name }}">
					<div class="card card-stats {{ ($isCurrentModule) ? 'bg-success' : '' }}">
						<div class="card-header card-header-warning card-header-icon">
							<div class="card-icon card-icon-vero">
								@switch ($submodule->layout_ConfigIcons['type'])

									@case('materialicons')
										<i class="material-icons">{{ $submodule->layout_ConfigIcons['class'] }}</i>
										@break

									@case('fontawesome')

										<i class="{{ $submodule->layout_ConfigIcons['class'] }}" aria-hidden="true"></i>
										@break

								@endswitch
							</div>
							<p class="card-category {{ ($isCurrentModule) ? 'text-white' : '' }}">Submódulo</p>
							<h3 class="card-title"><small class="text-ellipsis {{ ($isCurrentModule) ? 'text-white' : '' }}">{{ $submodule->name }}</small></h3>
						</div>
						<div class="card-footer">
							<div class="stats text-center">
								<a
									href="{{ route('company.connector.config', [$module->key, $submodule->key]) }}"
									class="btn {{$isCurrentModule ? 'btn-warning' : 'btn-danger'}} btn-block"
									onClick="{{ $hasCurrentModule && !$isCurrentModule ? 'javascript:return confirm(\'Tem certeza que deseja trocar o módulo atual para o módulo: ' . $submodule->name . '\')' : ''}}"
								>
									
									@if ($hasCurrentModule)

										@if ($isCurrentModule)

											Editar Configurações

										@else

											Modificar para Este

										@endif 

									@else
										Escolher
									@endif

								</a>
							</div>
						</div>
					</div>
				</div>

			@endforeach

		</div>
		<br /><br />

		@if ($hasCurrentModule)
	
			<div class="row">

				<div class="col-lg-12 col-12 text-center">
					@include('layouts.components.button_popup', [
						'label'				=> 'Desvincular um Conector para este módulo',
						'text'				=> 'Tem certeza que deseja desvincular um módulo conector?',
						'title'				=> 'Desvincular um Conector para este módulo',
						'icon'				=> 'link_off',
						'action'			=> route('company.connector.config_null', [$module->key]),
						'actionLabel'		=> 'Desvincular',
						'btnClass'			=> 'btn btn-warning btn-block',
					])
				</div>
				
			</div>
		
		@endif
	
	</div>
</div>

@endsection
