@php

	$company = Auth::user()->MyCompany();

@endphp

<ul class="nav">

	@include('layouts.includes.menu_item', [
		'url'			=> route('home'),
		'isActive'		=> function () {return request()->is('/') ||  request()->is('home');},
		'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-hashtag'],
		'label'			=> 'Dashboard',
	])

	@include('layouts.includes.menu_item', [
		'url'			=> route('users.showme'),
		'isActive'		=> function () {return request()->is('showme');},
		'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-user'],
		'label'			=> 'Meu perfil',
	])

	@if( Auth::user()->HasPermission('company_config'))

		@include('layouts.includes.menu_item', [
			'url'			=> route('companies.index'),
			'isActive'		=> function () {return request()->is('companies') ||  request()->is('companies/*');},
			'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-building'],
			'label'			=> 'Empresas',
		])

	@endif

	@if( Auth::user()->HasPermission('profile_config'))

		@include('layouts.includes.menu_item', [
			'url'			=> '/profiles',
			'isActive'		=> function () {return request()->is('profiles') ||  request()->is('profiles/*');},
			'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-users'],
			'label'			=> 'Perfis',
		])

	@endif

	@if(Auth::user()->HasPermission('user_config'))

		@include('layouts.includes.menu_item', [
			'url'			=> '/users',
			'isActive'		=> function () {return request()->is('users') ||  request()->is('users/*');},
			'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-id-badge'],
			'label'			=> 'Usuários',
		])

	@endif

	@if(Auth::user()->HasSelectedCompany())

		@if (Auth::user()->HasPermission('company_config'))

			@include('layouts.includes.menu_item', [
				'url'			=> route('company.configuration'),
				'isActive'		=> function () {return request()->is('company/configuration') ||  request()->is('company/configuration');},
				'icon'			=> ['type'=>'fontawesome', 'class'=>'fa fa-check'],
				'label'			=> 'Configurar',
			])

		@endif

		<h4 class="bg-pink-vero text-white p-2 mt-3" style="overflow:hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $company->name }}">
			<small class="" style="display:block;">Empresa:</small>
			{{$company->name}}
		</h4>

		@foreach (App\Helpers\System::GetAllModules() as $module)

			@php

				$hasImport = $company->HasSubmoduleConnectorForModule($module->key);
				$hasExport = $company->GetSubmoduleExporter($module->key)->CanExportForModule($module);

				$submenu = [];

				if (Auth::user()->HasPermission('data_edit'))
				{
					$submenu[] = [
						'label'		=> 'Listar',
						'title'		=> 'Lista todos os registros já existentes para o módulo: ' . $module->name,
						'url'		=> route('crud.list', [$module->key]),
						'icon'		=> ['type'=>'fontawesome', 'class'=>'fa fa-list'],
						'isActive'	=> function () use ($module) {return request()->is("crud/{$module->key}/list");},
					];
				}

				if (Auth::user()->HasPermission('data_import'))
				{
					$submenu[] = [
						'label'		=> 'Importar',
						'title'		=> $hasImport ? 'Ver a lista de arquivos importados ou importar novos arquivos' : 'Módulo de importação desabilitado',
						'url'		=> route('company.import', [$module->key]),
						'icon'		=> ['type'=>'fontawesome', 'class'=>'fa fa-download'],
						'enabled'	=> $hasImport,
						'isActive'	=> function () use ($module) {
							return request()->is("company/import/{$module->key}");
						},
					];
				}

				if (Auth::user()->HasPermission('data_purge'))
				{
					$submenu[] = [
						'label'		=> 'Log Importação',
						'title'		=> $hasImport ? 'Veja os logs de importação executados' : 'Este módulo não possui importação automatizada',
						'url'		=> route('company.logs.import', [$module->key]),
						'icon'		=> ['type'=>'fontawesome', 'class'=>'fa fa-inbox'],
						'isActive'	=> null,
						'enabled'	=> $hasImport && $hasExport,
					];
				}

				if (Auth::user()->HasPermission('data_export'))
				{
					$submenu[] = [
						'label'		=> 'Exportar',
						'title'		=> $hasExport ? 'Ver a lista de arquivos exportados ou exportar novos arquivos' : 'Módulo de exportação desabilitado',
						'url'		=> route('company.export', [$module->key]),
						'icon'		=> ['type'=>'fontawesome', 'class'=>'fa fa-cloud-upload'],
						'enabled'	=> $hasExport,
						'isActive'	=> function () use ($module) {
							return request()->is("company/export/{$module->key}");
						},
					];
				}

				if (Auth::user()->HasPermission('data_purge'))
				{
					$submenu[] = [
						'label'		=> 'Log Exportação',
						'title'		=> $hasExport ? 'Veja os logs de exportação executados' : 'Este módulo não possui exportação automatizada',
						'url'		=> route('company.logs.import', [$module->key]),
						'icon'		=> ['type'=>'fontawesome', 'class'=>'fa fa-inbox'],
						'isActive'	=> null,
						'enabled'	=> $hasImport && $hasExport,
					];
				}

			@endphp

			@include('layouts.includes.menu_item', [
				'url'			=> null,
				'icon'			=> $module->layout_MenuIcons,
				'label'			=> $module->name,
				'submenu'		=> $submenu,
				'isActive'		=> function () use ($module) {
					return request()->is("crud/{$module->key}/*")
						|| request()->is("company/import/{$module->key}")
						|| request()->is("company/export/{$module->key}")
					;
				},
			])

		@endforeach

	@endif

</ul>
