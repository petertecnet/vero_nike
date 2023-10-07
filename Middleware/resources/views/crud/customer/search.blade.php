@csrf
    <p>Nome:</p>
    <input type="text" class="form-control" name="companyName" id="companyName" value="{{ $companyName }}"><br>
    <p>Status:</p>
    <select class="#" name="companyStatus" id="companyStatus">
        <option value="1">Ativa</option>
        <option value="2">Inativa</option>
        @if($companyStatus == 1)
        <option value="1" selected hidden>Ativa</option>
        @elseif($companyStatus == 2)
        <option value="2" selected hidden>Inativa</option>
        @endif
    </select><br><br>
    <div class="form-group float-right">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
