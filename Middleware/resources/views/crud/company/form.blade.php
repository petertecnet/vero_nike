@csrf
<div class="row">
    <input type="hidden" name="user_id" id="user_id" value=" {{ Auth::user()->id }} " class="form-control">

    <div class="col-md-12">
        Nome:
        <input type="text" name="name" id="name" value="{{ $cad->name ?? old('name') }}" class="form-control">
        <br>
    </div>

    <div class="col-md-4">
        Status
        <select class="form-control" name="status" id="status" style="width: 100%;">
            <option class="form-control" value="1" @if (!empty($cad)) {{ $cad->status == 1 ? 'selected' : '' }} @endif>
                Ativa
            </option>
            <option class="form-control" value="2" @if (!empty($cad)) {{ $cad->status == 2 ? 'selected' : '' }} @endif>
                Inativa
            </option>
        </select>
    </div>
    <div class="col-md-6">
        CNPJ:
        <input type="text" name="CNPJ" id="CNPJ" value="{{ $cad->CNPJ ?? old('CNPJ') }}"
            class="form-control">
        <br>
    </div>
    <div class="col-md-12">
		<div class="form-group">
			<label class="bmd-label-floating" for="name">Usuarios:</label>


            <div class="col-md-12">
            <div class="row">
            @forelse (config('users') as $key => $user)

<div class="col-md-12">
    <div class="form-check">
        <label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="users[]" value="{{ $key }}" @if (!empty($cad)) {{ (in_array($key, old('users', $cad->users))) ? 'checked="checked"' : '' }} @endif/>
                                <p class="text-dark"><strong>{{ $user['name'] }}</strong></p>
								<span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
    </div>
</div>

@empty

<div class="col-md-12">Nenhuma permissão disponível no momento</div>

@endforelse

                </div>
			</div>
		</div>
	</div>
    <div class="form-group float-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                      Salvar
                                    </button>

                                </div>
                            </div>
