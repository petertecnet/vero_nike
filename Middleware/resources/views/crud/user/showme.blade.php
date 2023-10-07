@extends('layouts.single')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><i class="fa fa-user" aria-hidden="true"></i> Meu perfil</h4>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('users.update', $cad->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @include('crud.user.form')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;"><img class="img"
                                src="/avatar/{!! ($cad->avatar) ? $cad->avatar : 'avataruserprofile.png' !!} " /></a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{ $cad->login }} </h6>
                        <h4 class="card-title">{{ $cad->name }} </h4>
                        <p class="card-description">
                            <strong> Perfil:</strong> {{$cad->getProfileNameAttribute()}} <br>
                            <strong> Email:</strong> {{$cad->email}} <br>
                            <strong> Criando em:</strong> {{$cad->created_at}} <br>
                            <strong> Ultima atualização:</strong>{{ date('d/m/Y', strtotime( $cad->updated_at) )}}<br>
                        </p>
                    </div>
                </div>

            <div class="col-md">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><i class="fa fa-building" aria-hidden="true"></i> Minhas empresas</h4>
                    </div>
                    <div class="card-body"  style="
    max-height:400px;
    overflow-y:auto;">
                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach(Auth::user()->companies as $company)

                                    <td>{{ $company->id }} </td>
                                    <td>{{ $company->name }} </td>
                                    <td>{{ $company->status }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-light btn-sm btn-success" rel="tooltip" title="Selecionar"
                                                href="{{ route('company.select', [$company->id]) }}" onchange="location = this.value;">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
