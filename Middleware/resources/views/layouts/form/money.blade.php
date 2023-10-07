@php

	$uuid = uniqid();

	if (!isset($columns))
		$columns = 12;
	
@endphp

<div class="col-md-{{ $columns }}">
	<div class="form-group row {{ $errors->has($field) ? 'has-danger' : '' }}">
		<label for="{{ $uuid }}" class="col-md-4 bmd-label-floating">{!! $label !!}</label>
		<div class="col-md-12">
			<input id="{{ $uuid }}" type="number" step="0.01" class="form-control" name="{{ $field }}" value="{{ old($field, $value) }}" autocomplete="none" />
			
			@if($errors->has($field))
			
				<span class="form-control-feedback">
					<i class="material-icons">clear</i>
				</span>
			
				@foreach($errors->get($field) as $message)
				
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				
				@endforeach
			
			@endif
		</div>
	</div>
</div>