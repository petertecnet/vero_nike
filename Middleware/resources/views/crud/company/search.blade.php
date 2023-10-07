@csrf
<div class="row">
	<div class="col-md-12">
		<h3>Pesquisar</h3>
	</div>
	<div class="col-md-6">
		<input type="text" class="form-control" name="companyname" id="companyname" value="{{ $companyname }}" placeholder="Pesquisa por nome da empresa">
	</div>
	<div class="col-md-4">
		<select class="form-control" name="companystatus" id="companystatus">
			<option value="" selected>Sem filtro</option>
			<option value="1" {{ $companystatus == 1 ? 'selected' : '' }}>Ativa</option>
			<option value="2" {{ $companystatus == 2 ? 'selected' : '' }}>Inativa</option>
	</select>
</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-primary">Buscar</button>
	</div>
</div>
