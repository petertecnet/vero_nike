@extends('layouts.single')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">Cliente  - <strong>{{$cad->name}}</strong>
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
                    <div class="card-header card-header-primary">Dados do cliente <strong>{{$cad->name}}</strong>
                        <a href="{{route('company.customer.edit', $cad->id) }}"><button type="button"
                                class="btn btn-success tet-white float-right">

                                <i class="material-icons">edit</i> </button></a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <strong> Nome:</strong> {{$cad->name}}<br>

                                <strong> Empresa:</strong> {{ $cad->getCompanyNameAttribute() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
