@extends('layouts.single')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">Company - <strong>{{$cad->name}}</strong>
                        <a href="{{route('companies.index') }}"><button type="button"
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
                    <div class="card-header card-header-primary">Dados de <strong>{{$cad->name}}</strong>
                        <a href="{{route('companies.edit', $cad->id) }}"><button type="button"
                                class="btn btn-success tet-white float-right">

                                <i class="material-icons">edit</i> </button></a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <strong> Nome:</strong> {{$cad->name}}<br>

                                <strong> Documento:</strong> {{$cad->document}} <br>
                                <strong> Status:</strong> {{$cad->status}} <br>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-dark">
                                <div class="inner">
                                    <a href="/companies/{{$cad->id}}/customers">
                                        <h3 class="text-center text-white"><strong>Clientes</strong></h3>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark">
                                <div class="inner">
                                    <a href="/companies/{{$cad->id}}/customers">
                                        <h3 class="text-center text-white"><strong>Fornecedores</strong></h3>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark">
                                <div class="inner">
                                    <a href="/companies/{{$cad->id}}/customers">
                                        <h3 class="text-center text-white"><strong>CIAP</strong></h3>
                                    </a>
                                </div>

                            </div>
                        </div>
                        </
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
