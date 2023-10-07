@csrf
<div class="row">
    <div class="col-md-12">
    <h3>Pesquisar</h3>
    </div>
    <div class="col-md-6">
    <input type="text" class="form-control" name="username" id="username" value="{{ $username }}" placeholder="Pesquisa por nome do usuário">
    </div>
    <div class="col-md-4">
    <input type="email" class="form-control" name="useremail" id="useremail" value="{{ $useremail }}" placeholder="Pesquisar por email do usuário">
    </div>
    <div class="col-md-2">
    <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>

