<ul class="navbar-nav" style="margin-right:10px;">
	<li class="nav-item">

		<form _ngcontent-gmx-c3="" class="navbar-form">
			<div _ngcontent-gmx-c3="" class="input-group no-border">
				<select name="SelectID" id="SelectID" class="veroselect_permissions" onchange="location = this.value;">
					<option value="" disabled selected hidden>Selecione uma empresa</option>

					@forelse(Auth::user()->companies as $company)

						<option value="{{ route('company.select', [$company->id]) }}" {{@Auth::User()->config->company == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>

					@empty

						<option value="" disabled>[Nenhuma Empresa]</option>
					
					@endforelse

					@if (Auth::user()->HasPermission('company_config'))

						<option value="" disabled>-----------------------</option>
						<option value="{{ route('companies.create') }}">Criar Nova Empresa</option>

					@endif

				</select>
			</div>
		</form>

	</li>
</ul>