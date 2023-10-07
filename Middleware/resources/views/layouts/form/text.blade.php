@php

$uuid = uniqid();

if (!isset($columns))
	$columns = 12;

if (!isset($rows))
	$rows = 5;

@endphp

<div class="col-md-{{ $columns }}">
	<div class="form-group row">
		<label for="{{ $uuid }}" class="col-md-4 bmd-label-floating">{!! $label !!}</label>
		<div class="col-md-12">
			<textarea class="form-control {{ $errors->has($field) ? 'is-invalid' : '' }}" rows="{{ $rows }}" id="{{ $uuid }}" name="{{ $field }}">{{ old($field, $value) }}</textarea>
			
			@if($errors->has($field))
			
				@foreach($errors->get($field) as $message)
				
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				
				@endforeach
			
			@endif
		</div>
	</div>
</div>