@extends('layouts.single')
@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">Novo Cadastro
                    <a href="{{route('profiles.index') }}"><button type="button"
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
                <form action="{{ route('profiles.store') }}" method="post">
                    @method('POST')
                    @include('crud.profile.form')
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
</div>
@endsection
