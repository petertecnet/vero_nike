<!-- OBS rota sendo ajustada por enquanto rota e: clientes_importe -->


@extends('layouts.single')
@section('content')

<center><div id="client_import">
<div>
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            IMPORTAR CLIENTES CSV XML
          
        </h2>
</div>

<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden">
                <div class="">


                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                  </div>
                @endif


                    <form action="{{ route('import_CSV') }}" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div>
                           <label style="background-color:grey; padding:20px; border-radius:12px;color:#ffffff;"for="csv_file">Escolha o arquivo CSV:</label>
                            <input id="csv_file" class="form-control" style="display:none;"type="file" name="csv_file" required/>
                        </div>

                        <div class="mt-4 flex items-center">
                        CASO O ARQUIVO JA TENHA HEADERS - MARQUE

                            <input id="header" class="ml-1" type="checkbox" name="header" checked/>
                        </div>

                        <button class="btn btn-primary" id="submit-post" >
                        IMPORTAT CSV/XLS
                        </button>
                    </form>

                  

             

                </div>
            </div>
        </div>
    </div>


<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->   
<!-- CAMPOS IMPORTAÇÃO DE ARQUIVOS CSV -->       

<!-- CAMPOS IMPORTAÇÃO XML-->    
<!-- CAMPOS IMPORTAÇÃO XML-->   
<!-- CAMPOS IMPORTAÇÃO XML-->   
<!-- CAMPOS IMPORTAÇÃO XML-->   


    <div class="container" style="margin-top: 50px;">
        <h4 style="text-align: center;">IMPORT XML</h4>

        <form action="{{ route('xml-upload') }}" id="frm-create-course" method="post">
           @csrf
            <div class="form-group">
                <label style="background-color:grey; padding:20px; border-radius:12px;color:#ffffff;"for="file">Escolha o arquivo XML:</label>
                <input type="file" class="form-control" required id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary" id="submit-post">IMPORTAR XML </button>
        </form>
    </div>
<!-- CAMPOS IMPORTAÇÃO XML-->    
<!-- CAMPOS IMPORTAÇÃO XML-->   
<!-- CAMPOS IMPORTAÇÃO XML-->   
<!-- CAMPOS IMPORTAÇÃO XML-->   
</div>

</div>
</center>
@endsection





<!-- CLIENTES IMPORTADOS 
                    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                            
                         


                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Codigo do Cliente</span>
                                </th>

                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome do Cliente</span>
                                </th>

                               
                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DDD</span>
                                </th>

                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Telefone</span>
                                </th>

                             

                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                                </th>


                            </tr>
                            </thead>




                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($cliente as $cliente)
                                <tr class="bg-white">
                                  
                                   <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $cliente->company_id }}
                                    </td>
                                   
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $cliente->codigo_cliente }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $cliente->nome_cliente }}
                                    </td>

                                

                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $cliente->telefone }}
                                    </td>

                                   
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $cliente->email }}
                                    </td>

                                  
                                 
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

CLIENTES INPORTADOS-->   