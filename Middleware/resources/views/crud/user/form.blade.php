@csrf
<div  class="form-group row">
    <label for="email" class="col-md-4 bmd-label-floating">{{ __('Nome') }}</label>

    <div class="col-md-8">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ $cad->name ?? old('name') }}" autocomplete="name" autofocus />

        @error('name')

        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>

        @enderror

    </div>
    <div class="col-md-4">
        <label for="avatar" class="btnPerson">Foto do perfil</label>
        <input id="avatar" type="file" class="form-control veroselect_permissions" name="avatar" style="color:white;" />
    </div>
</div>

<div class="form-group row">

    <div class="col-md-6">

    <label for="email" class="col-md-4 bmd-label-floating">{{ __('E-mail ') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ $cad->email ?? old('email') }}" >

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
<div class="col-md-6">

<label for="login" class="col-md-4 bmd-label-floating">{{ __('Login ') }}</label>
    <input id="login" type="login" class="form-control @error('login') is-invalid @enderror" name="login"
        value="{{ $cad->login ?? old('login') }}" required >

    @error('login')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>







<div class="form-group row">
    <label for="password" class="col-md-4 bmd-label-floating">{{ __('Nova Senha') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">

	@if( Auth::user()->HasPermission('profile_config'))
    <div class="col-md-6">
        <select class="veroselect_permissions" name="profile_id" id="profile_id" style="width: 100%;">

            <option value="" selected>Nenhuma Permissão</option>

            @foreach ($profiles as $profile)

            <option value="{{ $profile->id }}" {!! !empty($cad) && $cad->profile_id == $profile->id ? 'selected' : ''
                !!}>
                Permissão de: {{ $profile->name }}
            </option>

            @endforeach

        </select>
    </div>
    @endif

</div>

@if(isset($companies))
<div class="row">
    <div class="col-md-12" >
    <div class="card">
                        <h4 style="padding: 10px;" class="text-center"> Selecionar empresas</h4>

                    <div class="card-body">
<fieldset class="form-group row btn btn-primary text-white">
    <div class="col-md-6 float-center">
        <div class="form-check ">
            <label class="form-check-label text-white">
                <input type="checkbox" onclick="toggle(this);" class="bg-primary text-white form-check-input">
                Marca/Desmarca todos<br/>
            </label>
        </div>
    </div>
</fieldset>

<fieldset class="form-group row"  style="
    max-height:400px;
    overflow-y:auto;">
    @forelse ($companies as $company)

    <div class="col-md-6">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="companies[]" value="{{ $company->id }}" {!!
                    is_array($currentCompanies) && in_array($company->id, $currentCompanies) ? 'checked="checked"' : ''
                !!} />
                <p class="text-dark"><strong>{{ $company->id }} - {{ $company->name }}</strong> -
                    {{ $company->CNPJ }}</p>
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
            </label>
        </div>
    </div>

    @empty

    <div class="row">
        <div class="col-md-12">Nenhuma empresa disponível no momento</div>
    </div>

    @endforelse

</fieldset>

@endif

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
<script>
    function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf("@"));
dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) &&
    (usuario.search("@")==-1) &&
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) &&
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&
    (dominio.indexOf(".") >=1)&&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
document.getElementById("msgemail").innerHTML="E-mail válido";
alert("E-mail valido");
}
else{
document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
alert("E-mail invalido");
}
}

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
