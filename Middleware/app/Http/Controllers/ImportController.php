<?php
namespace App\Http\Controllers;
use App\Models\CsvData;
use App\Models\Modules\Cliente;
use Illuminate\Http\Request;
use App\Imports\ImportGlobal;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;
use App\Models\Modules\Cliente as ModulesCliente;
use Maatwebsite\Excel\HeadingRowImport;



class ImportController extends Controller
{

        protected $view = 'import.cliente';
        protected $route = 'import';
    public function CSVImport(CsvImportRequest $request)
    {
           // IMPORT CSV FILES
           // IMPORT CSV FILES
           // IMPORT CSV FILES
           // IMPORT CSV FILES
           
        if ($request->has('header')) {
            $headings = (new HeadingRowImport)->toArray($request->file('csv_file'));
            $data = Excel::toArray(new ImportGlobal, $request->file('csv_file'))[0];
        } else {
            $data = array_map('str_getcsv', file($request->file('csv_file')->getRealPath()));
        }
        
        // CSV HEADER -- DATA -- FILENAME HERE //
        // CSV HEADER -- DATA -- FILENAME HERE //
 
        if (count($data) > 0) {
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields_vero', [
            'headings' => $headings ?? null,
            'csv_data' => $csv_data,
            'csv_data_file' => $csv_data_file
        ]);

      
    }

    public function CSVprocessImport(Request $request)
    {

           //PROCESS DATA CSV HERE.....
           //PROCESS DATA CSV HERE.....
           //PROCESS DATA CSV HERE......
        

        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $companies = new ModulesCliente();

            //CAMPOS CSV DE TRATAMENTOS ESTARÃO EM CONFIG/APP
            //foreach (config('system.clientes.fields') as $index => $field) {
            foreach (config('system.fornecedores.fields') as $index => $field) {
                if ($data->csv_header) {
                    //FIELDS // // DATA CONSUME IMPORT FIELDS
                    $companies->$field = $row[$request->fields[$field]];
                } else {
                    $companies->$field = $row[$request->fields[$index]];
                }
            }
            $companies->save();
        }

        //PROCESS DATA CSV HERE.....
        //PROCESS DATA CSV HERE.....
        //PROCESS DATA CSV HERE.....

        //OBS ROTA AINDA NAO ALIMENTADA
        return redirect()->route($this->route . '.cliente')->with('sucess', "Cadastro realizado com sucesso");
    }
}