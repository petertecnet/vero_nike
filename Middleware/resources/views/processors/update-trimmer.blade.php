@extends('layouts.single')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">Editar submódulo processador: Aparador de espaços
                        <a href="{{route('company.processor', [$module])}}">
                            <button type="button" class="btn btn-success tet-white float-right">
                                <i class="fa fa-arrow-left "></i> VOLTAR
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                    @foreach($config as $key => $mod)
                        @if($key == $module)
                            @foreach($mod as $key => $value)
                                @if($key == 'processors')
                                    @foreach($value as $type => $item)
                                        @foreach($item as $key => $value)
                                            <form action="{{ route('company.processor.update', [$module, $type, $keyEdit]) }}" method="POST">
                                            @endforeach
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                            @csrf
                                <div class="col-md-12">
                                    Nome:
                                    <input type="text" name="trimmerName" id="trimmerName" class="form-control" value="{{$trimmerName}}" required><br>
                                    Coluna:
                                    <select name="column" id="column" class="form-control" required>
                                        <option value="aa" @if($column == "aa") {{'selected'}} @endif>aa</option>
                                        <option value="bb" @if($column == "bb") {{'selected'}} @endif>bb</option>
                                        <option value="cc" @if($column == "cc") {{'selected'}} @endif>cc</option>
                                    </select><br>
                                    <input type="checkbox" name="before" id="before" @if($before == true) {{'checked="checked"'}} {{'value="true"'}} @else {{'value="false"'}} @endif/> Aparar espaços <strong>Antes</strong><br>
                                    <input type="checkbox" name="between" id="between" @if($between == true) {{'checked="checked"'}} {{'value="true"'}} @else {{'value="false"'}} @endif/> Aparar espaços <strong>Internos</strong><br>
                                    <input type="checkbox" name="after" id="after" @if($after == true) {{'checked="checked"'}} {{'value="true"'}} @else {{'value="false"'}} @endif/> Aparar espaços <strong>Depois</strong>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Salvar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    document.getElementById("before").onclick = function() {
        let checkbox = document.getElementById('before');
        if(checkbox.checked) {
            checkbox.value = true;
        } else {
            checkbox.value = false;
        }
    }

    document.getElementById("between").onclick = function() {
        let checkbox = document.getElementById('between');
        if(checkbox.checked) {
            checkbox.value = true;
        } else {
            checkbox.value = false;
        }
    }

    document.getElementById("after").onclick = function() {
        let checkbox = document.getElementById('after');
        if(checkbox.checked) {
            checkbox.value = true;
        } else {
            checkbox.value = false;
        }
    }

</script>

@endsection
