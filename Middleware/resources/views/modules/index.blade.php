@extends('layouts.single')
@section('content')

<style type="text/css">

.card-icon-vero {
	background: rgb(235,61,117) !important;
	background: linear-gradient(90deg, rgba(235,61,117,1) 0%, rgba(208,34,90,1) 100%) !important;
}

.text-ellipsis {
	white-space:nowrap;
	text-overflow:ellipsis;
	overflow:hidden;
	max-width:calc(100% - 102px);
	display:inline-block;
}

</style>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">Módulos da empresa: {{$company->name}}</div>
				</div>
			</div>
			
			@foreach ($modules as $module)

				<div class="col-lg-4 col-md-6 col-sm-6" title="{{ $module->name }}">
					<div class="card card-stats">
						<div class="card-header card-header-warning card-header-icon">
							<div class="card-icon card-icon-vero">
							@switch ($module->layout_ConfigIcons['type'])

								@case('materialicons')
									<i class="material-icons">{{ $module->layout_ConfigIcons['class'] }}</i>
									@break

								@case('fontawesome')
									<i class="{{ $module->layout_ConfigIcons['class'] }}" aria-hidden="true"></i>
									@break

							@endswitch
							</div>
							<p class="card-category">Módulo</p>
							<h3 class="card-title"><small class="text-ellipsis">{{ $module->name }}</small></h3>
						</div>
						<div class="card-body text-left">
							<h4 class="card-title">Submódulo Conector:</h4>
							<p class="card-category">
								@if ($company->HasSubmoduleConnectorForModule($module->key))
									{{ $company->GetSubmoduleConnector($module->key)->name }}
								@else
									<i class="text-muted text-gray">Nenhum</i>
								@endif
							</p>
							<h4 class="card-title">Submódulo Processador:</h4>
							<p class="card-category">
								@php $countProcessors = count($company->GetSubmoduleProcessorConfigList($module->key)); @endphp
								@if ($countProcessors > 0)
									Processadores: {{ $countProcessors }} {{ $countProcessors > 1 ? 'processamentos' : 'processamento' }}
								@else
									<i class="text-muted text-gray">Nenhum</i>
								@endif
							</p>
							<h4 class="card-title">Submódulo Exportador:</h4>
							<p class="card-category">

								@if($company->HasSubmoduleExporterForModule($module->key))
									Arquivo Excel para SAP B1
								@else
									Nenhum
								@endif
							</p>
						</div>
						<div class="card-footer">
							<div class="stats text-center">
								<a href="{{ route('company.connector', [$module->key]) }}" class="btn btn-success" >Conector</a>
								<a href="{{ route('company.processor', [$module->key]) }}" class="btn btn-info" >Processador</a>
							</div>
						</div>
					</div>
				</div>

			@endforeach
			
		</div>
	</div>
</div>

@endsection
