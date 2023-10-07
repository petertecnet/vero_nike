@php

	$uuid = uniqid('button-popup-');

	if (!isset($method))
		$method = 'post';

	if (!isset($btnClass))
		$btnClass = 'btn btn-light btn-sm';

@endphp

<a class="{{ $btnClass }}" rel="tooltip" title="{{ $title }}" href="#{{ $uuid }}">
	@if (isset($icon))

		<i class="material-icons">{{ $icon }}</i>

	@endif
	{{ $label }}
</a>

<div id="{{ $uuid }}" class="overlay">
	<div class="popup" style="height:auto;">
		<p id="hello_admin">Olá! {{ Auth::user()->name }}</p>
		<p id="delete_user">{!! $text !!}</p>
		<form  action="{{ $action }}" method="{{ $method }}">
			<input type="hidden" name="_method" value="{{ $method }}" />
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="text-center">
				<button type="submit" rel="tooltip" title="{{ $actionLabel }}" class="btn btn-success btn-light btn-sm">
					{{ $actionLabel }}
				</button>
				<button type="button" onclick="history.go(-1);" rel="tooltip" action="Voltar ao sistema" class="btn btn-warning btn-light btn-sm">
					Voltar a plataforma
				</button>
			</div>
		</form>
	</div>
</div>
