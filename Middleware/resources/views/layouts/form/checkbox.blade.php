@php

	$uuid = uniqid();

	if (!isset($columns))
		$columns = 12;

	if (!isset($checked) || $checked !== true)
		$checked = false;

	if (!isset($value))
		$value = '1';
	
@endphp

<div class="col-md-{{ $columns }}">
	<div class="form-check ml-3">
		<label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="{{ $field }}" value="{{ $value }}" {!! ($checked) ? 'checked="checked"' : '' !!} />
			<p class="text-dark">{!! $label !!}</p>
			<span class="form-check-sign">
				<span class="check"></span>
			</span>
		</label>
	</div>
</div>