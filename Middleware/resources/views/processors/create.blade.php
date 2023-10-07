@extends('layouts.single')
@section('content')

<div class="content">
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                @forelse ($modules as $key => $mod)
                    @if($key == $module)
                        <div class="card-header card-header-primary">Novo Processador para módulo {{$mod['name']}}
                    @endif
                @endforeach
                @foreach($companies as $cad)
                    <a href="{{ route('company.processor', [$module]) }}">
                @endforeach
                    <button type="button"
                            class="btn btn-success tet-white float-right">
                            <i class="fa fa-arrow-left "></i> VOLTAR</button></a>
                </div>
                <div class="card-body">


                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container">

    <div class="row ">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">Formulario para novo cadastro</strong>
                </div>
            @include('layouts.alerts')
            <div class="card-body">
            @foreach($submodules as $key => $sub)
                    <form action="{{ route('company.processor.create', [$module, $key]) }}" method="post">
            @endforeach
                    @method('PUT')
                    @include('processors.form')
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
</div>

@endsection
