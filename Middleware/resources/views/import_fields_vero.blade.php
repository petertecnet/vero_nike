@extends('layouts.single')
@section('content')

<center>
<div id="#client_import">
<div>
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selecione os campos se necessário') }}
        </h2>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

     
                    <!--ROTAS DE IMPORTAÇÃO-->
                    <form action="{{ route('import_process') }}" method="POST">
                        @csrf

                        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}"/>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            @if (isset($headings))
                                <thead>
                                <tr>
                                    @foreach ($headings[0][0] as $csv_header_field)
                                        {{--         
                                                                               @dd($headings)--}}
                                        <!--HEADER DATA CSV -->
                                        <th class="px-6 py-3 bg-gray-50">
                                            
                                            <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $csv_header_field }}</span>
                                        </th>
                                        <!--HEADER DATA CSV -->
                                    @endforeach
                                </tr>
                                </thead>
                            @endif

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            <!--CSV DATA IMPORT CSV DATA -->
                            @foreach($csv_data as $row)
                                <tr class="bg-white">
                                    @foreach ($row as $key => $value)
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $value }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach

                            <tr>
                                @foreach ($csv_data[0] as $key => $value)
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        <select name="fields[{{ $key }}]">
                                            <!--DATA CAMPOS NO ARQUIVO APP -->
                                            @foreach (config('system.fornecedores.fields') as $data_campos_)
                                                <option value="{{ (\Request::has('header')) ? $data_campos_: $loop->index }}"
                                                        @if ($key === $data_campos_) selected @endif>{{ $data_campos_ }}</option>
                                            @endforeach
                                             <!--DATA CAMPOS NO ARQUIVO APP -->
                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
 <!--BOTÃO UPLOAD -->
                        <button class="mt-4">
                            {{ __('UPLOAD ARQUIVO CSV') }}
                        </button>
 <!--BOTÃO UPLOAD -->                        
                    </form>

                </div>
            </div>
        </div>
    </div>
                                        </div>

                                        </div>
                                        </center>
@endsection