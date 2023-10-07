@php

	$uuid = uniqid();

	if (!isset($columns))
		$columns = 12;

	if (!isset($placeholder))
		$placeholder = 'Selecione uma opção';

	if (!isset($value))
		$value = null;
	
@endphp

<div class="col-md-{{ $columns }}">
	<div class="form-group row {{ $errors->has($field) ? 'has-danger' : '' }}">
		<label for="{{ $uuid }}" class="col-md-2 bmd-label-floating">{!! $label !!}</label>
		<div class="col-md-10">
			<select name="{{ $field }}" id="{{ $uuid }}" class="form-control" required>
				<option selected disabled hidden>{{ $placeholder }}</option>

				
				@foreach ($options as $option)

					@php $option = (object) $option; @endphp
				
					<option value="{{ $option->value }}" {{ (old($field, $value)) == $option->value ? 'selected' : '' }}>{{ $option->label }}</option>
				
				@endforeach

			</select>

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