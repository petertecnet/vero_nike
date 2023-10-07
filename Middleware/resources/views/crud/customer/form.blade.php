@csrf
<div class="row">
    <div class="col-md-12">
        Nome:
        <input type="text" name="name" id="name" value="{{ $cad->name ?? old('name') }}" class="form-control">
        <br>
    </div>

    <input type="hidden" name="company_id" id="company_id" value="{{ $company_id }}" class="form-control">


    <div class="col-md-12">
        <button type="subbmit" class="btn btn-primary  float-right">Salvar</button>
    </div>
</div>
