@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configurar Submódulo Processador: Aparador de espaços
						<a href="{{route('company.processor', [$module->key])}}">
							<button type="button" class="btn btn-success tet-white float-right">
								<i class="fa fa-arrow-left "></i> VOLTAR
							</button>
						</a>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<div class="form-group row">
								<label for="coluna" class="col-md-4 bmd-label-floating">{{ __('Coluna') }}</label>
								<div class="col-md-8">
									<select name="coluna" id="coluna" class="form-control" required>
										<option selected disabled value="">Selecione uma coluna</option>

										
										@foreach ($module->fields as $field)
										
											<option value="{{ $field['field'] }}" {{ (old('coluna', @$company->config->{$module->key}->processor[$index]->column) == $field['field']) ? 'selected' : '' }}>{{ $field['name']}}</option>
										
										@endforeach

									</select>

									@error('login')
										<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
							</div>
							


							<div class="form-group row">
			
								<div class="col-md-12">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="before" value="1" {!! old('before', @$company->config->{$module->key}->processor[$index]->before) ? 'checked="checked"' : '' !!} />
											<p class="text-dark">Aparar espaços <strong>Antes</strong></p>
											<span class="form-check-sign">
												<span class="check"></span>
											</span>
										</label>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="between" value="1" {!! old('between', @$company->config->{$module->key}->processor[$index]->between) ? 'checked="checked"' : '' !!} />
											<p class="text-dark">Aparar espaços <strong>Internos</strong></p>
											<span class="form-check-sign">
												<span class="check"></span>
											</span>
										</label>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="after" value="1" {!! old('after', @$company->config->{$module->key}->processor[$index]->after) ? 'checked="checked"' : '' !!} />
											<p class="text-dark">Aparar espaços <strong>Depois</strong></p>
											<span class="form-check-sign">
												<span class="check"></span>
											</span>
										</label>
									</div>
								</div>

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
