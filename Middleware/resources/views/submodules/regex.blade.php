@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">Configuração do Submódulo: Obtentor de Informação
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
                                <div class="form-group">
  <label for="comment">Expressão Regular:</label>
  <textarea class="form-control" rows="5" id="comment" name="regex" id="regex"></textarea>
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
