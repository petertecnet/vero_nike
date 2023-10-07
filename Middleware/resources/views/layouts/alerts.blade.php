@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show ">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong>  {{ session('success')}}
	</div>
@endif

@if (session('danger'))
	<div class="alert alert alert-dismissible fade show fa-blink" role="alert">
		{{ session('danger')}}
	</div>
@endif

@if($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible fade show fa-blink" role="alert">
			{{ $error }}
		</div>
	@endforeach
@endif
