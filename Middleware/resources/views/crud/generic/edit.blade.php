@extends('layouts.single')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">{{ !$entity->exists ? 'Criando Novo Registro' : 'Editando Registro: ' . $entity->id }}
						<a href="{{route('crud.list', [$module->key])}}">
							<button type="button" class="btn btn-success tet-white float-right">
								<i class="fa fa-arrow-left "></i> VOLTAR
							</button>
						</a>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							@csrf
							<div class="row">

								@foreach ($module->fields as $field)

									@switch($field['type'])

										@case('string')

											@include('layouts.form.string', [
												'label'			=> $field['name'],
												'field'			=> $field['field'],
												'value'			=> $entity->{$field['field']},
											])
											@break

										@case('money')

											@include('layouts.form.money', [
												'label'			=> $field['name'],
												'field'			=> $field['field'],
												'value'			=> $entity->{$field['field']},
											])
											@break

										@case('date')

											@include('layouts.form.date', [
												'label'			=> $field['name'],
												'field'			=> $field['field'],
												'value'			=> $entity->{$field['field']},
											])
											@break

										@case('select')

											@include('layouts.form.select', [
												'label'			=> $field['name'],
												'field'			=> $field['field'],
												'value'			=> $entity->{$field['field']},
												'options'		=> $field['options'],
											])
											@break
									
										@default

											<pre>{{ json_encode($field, JSON_PRETTY_PRINT) }}</pre>
											@break

									@endswitch

									@if($errors->has($field['field']))
									
										@foreach($errors->get($field['field']) as $message)
										
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										
										@endforeach
									
									@endif

								@endforeach

							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary float-right">Salvar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
