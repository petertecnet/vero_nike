@csrf
<div class="row">
<input type="hidden" name="user_id" id="user_id" value=" {{ Auth::user()->id }} " class="form-control">

    <div class="col-md-6">
        Nome do processador:
        <input type="text" name="config" id="config"
            class="form-control" onblur="this.value=this.value[0].toUpperCase() + this.value.substring(1)" required>
        <br>
    </div>
    <div class="col-md-12">
        Tipo de Processador: <br>
        <select name="submoduleSelect" id="submoduleSelect" disabled class="form-control">
            @foreach($submodules as $key => $sub)
                @if($key == $submodule)
                <option value="{{$key}}" selected>{{ $sub['name'] }}</option>
                <input type="hidden" id="option" name="option" value="{{$key}}">
                @endif
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary  float-right">Salvar</button>
    </div>
</div>
