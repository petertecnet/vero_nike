@php

	$uuid = uniqid();

	if (!isset($columns))
		$columns = 12;
	
@endphp

<style type="text/css">

/* input[type=date]::-webkit-datetime-edit-text {
    -webkit-appearance: none;
    display: none;
}
input[type=date]::-webkit-datetime-edit-month-field {
    -webkit-appearance: none;
    display: none;
}
input[type=date]::-webkit-datetime-edit-day-field {
    -webkit-appearance: none;
    display: none;
}
input[type=date]::-webkit-datetime-edit-year-field {
    -webkit-appearance: none;
    display: none;
} */

/* input[type=date].no-placeholder::-webkit-datetime-edit-year-field:not([aria-valuenow]),
input[type=date].no-placeholder::-webkit-datetime-edit-month-field:not([aria-valuenow]),
input[type=date].no-placeholder::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
    color: transparent;
} */

</style>

<div class="col-md-{{ $columns }}">
	<div class="form-group row {{ $errors->has($field) ? 'has-danger' : '' }}">
		<label for="{{ $uuid }}" class="col-md-4 bmd-label-floating">{!! $label !!}</label>
		<div class="col-md-12">
			<input id="{{ $uuid }}" type="date" class="form-control no-placeholder" name="{{ $field }}" value="{{ old($field, $value) }}" autocomplete="none" placeholder="" />
			
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