@extends('layouts.single')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">Submódulos Processadores:
                        <a href="{{route('company.configuration')}}">
                            <button type="button" class="btn btn-success tet-white float-right">
                                <i class="fa fa-arrow-left "></i> VOLTAR
                            </button>
                        </a>
                    </div>
                </div>
                @include('layouts.alerts')
                <br><br><br>
                @forelse ($modules as $key => $mod)
                    @if($key == $module)
                        <h3 class="col-md-12 text-center">Configurar processadores do módulo {{$mod->name}} da empresa {{$company->name}}</h3><br><br><br>
                    @else
                    @endif
                @empty
                @endforelse
                <div class="form-group float-left">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="card card-plain">
                                <div class="card-header card-header-primary">Adicionar Processadores:
                                </div>
                            </div>
                            <select name="subModulesSelect" id="subModulesSelect" class="form-control" onchange="location = this.value;">
                                <option value="" disabled selected>Selecione</option>
                                @foreach($submodules as $key => $sub)
                                        <option value="{{ route('company.processor.config', [$module, $key]) }}">{{ $sub->name }}</option>
                                @endforeach
                            </select><br><br><br><br><br>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><i class="fa" aria-hidden="true"></i> Lista de Processadores</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($config as $key => $mod)
                                        @if($key == $module)
                                            @foreach($mod as $key => $submod)
                                                @if($key == 'processors')
                                                    @foreach($submod as $type => $item)
                                                        <input type="hidden" value="{{
                                                        uasort($item, function($a,$b){

                                                            if($a['trimmerName'] == $b['trimmerName']) return 0;

                                                            return $a['trimmerName'] < $b['trimmerName'] ? -1 : 1;

                                                            })
                                                        }}">
                                                        @foreach($item as $key => $value)
                                                            <td>{{$value['trimmerName']}}</td>


                                    <td>
                                        <div class="btn-group">
                                                <a class="btn btn-light btn-sm btn-warning" rel="tooltip" title="Editar" href="{{ route('company.processor.edit', [$module, $type, $key]) }}">
                                                            <i class="material-icons">edit</i>
                                                </a>

                                                <form action="{{ route('company.processor.destroy', [$module, $key]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                    <button type="submit" rel="tooltip" title="Excluir" value="{{$type}}" class="btn btn-light btn-sm btn-danger">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     //RESPONSIVE REFRESH
     //RESPONSIVE REFRESH
    window.onresize = () => { window.location.reload()}
     //RESPONSIVE REFRESH
     //RESPONSIVE REFRESH

     /*let a = document.getElementById('SelectID');
     a.style.display = 'none';*/
</script>

@endsection
