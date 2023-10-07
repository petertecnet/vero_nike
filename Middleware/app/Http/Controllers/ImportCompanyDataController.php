<?php

namespace App\Http\Controllers;

use App\Models\Modules\Cliente;
use Illuminate\Http\Request;


class ImportCompanyDataController extends Controller
{

    //////////////////////CSV CONTROLLER DATA ////////////////////////////////
    public function index()
    {
        $cliente = Cliente::all();

        return view('import.cliente', compact('cliente')); // DATABASE CALL CSV
        
    } 
    
        public function sucess()
    {
        return view('import.sucesso'); // DATABASE CALL CSV
    } 

      //////////////////////CSV CONTROLLER DATA ////////////////////////////////


      //////////////////////XML CONTROLLER DATA ////////////////////////////////
      //////////////////////XML CONTROLLER DATA ////////////////////////////////
      //////////////////////XML CONTROLLER DATA ////////////////////////////////


      public function xml_data_import_(Request $request)
      {
          if($request->isMethod("POST")){
  
              $xml_data_string_get_file = file_get_contents(public_path('xml_data_vero_padrao.xml')); // AJUSTANDO PUBLIC PATH //
              $xml_obj_to_json_encode = simplexml_load_string($xml_data_string_get_file);
                      
              $json = json_encode($xml_obj_to_json_encode);
              $php_data_array_json_decode = json_decode($json, true); 
      
              echo "<pre>";
              print_r($php_data_array_json_decode);
              if(count($php_data_array_json_decode['module_cliente']) > 0){
  
                $data_array = array();
                  
                  foreach($php_data_array_json_decode['module_cliente'] as $index => $data_xml){
  
                      $data_array[] = [
                          "company_id" => $data_xml['company_id'],
                          "codigo_cliente" => $data_xml['codigo_cliente'],
                          "nome_cliente" => $data_xml['nome_cliente'],
                          "telefone" => $data_xml['telefone'],
                          "email" => $data_xml['email']
                      ];
                  }
  
                  Cliente::insert($data_array);
  /////////////////////////// mensagem de sucesso para xml ////////////////////////////////////
                  return back()->with('success','UPLOAD COM SUCESSO DO ARQUIVO XML!');
              }
          }
  
          return view("xml-data");
      }

      //////////////////////XML CONTROLLER DATA ////////////////////////////////
      //////////////////////XML CONTROLLER DATA ////////////////////////////////
      //////////////////////XML CONTROLLER DATA ////////////////////////////////
}