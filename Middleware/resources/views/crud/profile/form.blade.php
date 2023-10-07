@csrf
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="text" class="form-control" name="name" id="name" value="{{ $cad->name ?? old('name') }}" placeholder="nome do perfil">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="bmd-label-floating" for="name">Permições:</label>
			<div class="row">

				@forelse (config('permissions') as $key => $permission)

					<div class="col-md-12">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $key }}" @if (!empty($cad)) {{ (in_array($key, old('permissions', $cad->permissions))) ? 'checked="checked"' : '' }} @endif/>
								<p class="text-dark"><strong>{{ $permission['name'] }}</strong> {{$permission['description']}}</p>
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					</div>

				@empty

					<div class="col-md-12">Nenhuma permissão disponível no momento</div>

				@endforelse

			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button type="subbmit" class="btn btn-primary">Salvar</button>
	</div>
</div>
