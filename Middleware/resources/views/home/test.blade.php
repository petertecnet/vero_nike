<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Middleware Vero') }}</title>
</head>
<body>
	<form action="" method="post">
		@csrf
		<p><textarea name="query" style="width:100%; height:500px;">{{ old('query', $query) }}</textarea></p>
		<p><button type="submit">Enviar</button></p>
	</form>
	
	@if (is_array($result) && count($result) > 0)

		@php $columns = array_keys((array) $result[0]); @endphp

		<table border="1" style="border-collapse:collapse;">
			<thead>
				@foreach ($columns as $column)
					<th>{{ $column }}</th>
				@endforeach
			</thead>
			<tbody>
				@foreach ($result as $item)
					<tr>
						@foreach ($columns as $column)
							<td>{{ $item->{$column} }}</td>
						@endforeach
					</tr>
				@endforeach
			</tbody>
		<table>

	@endif
</body>
</html>
