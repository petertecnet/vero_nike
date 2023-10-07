<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\MovimentoEntrada;
use App\Services\Module;

class ModuleMovimentoEntradaService extends Module
{
	public $key				= 'movimento_entrada';
	public $name			= 'Notas de Entrada (Modelo 55)';
	public $description		= null;
	public $model			= MovimentoEntrada::class;
	public $fields			= [

		['type'=>'string', 'field'=>'id_movimento', 'name'=>'ID', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'date', 'field'=>'data_documento', 'name'=>'Data do documento', 'tooltip'=>null, 'placeholder'=>'Data do documento', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_cliente', 'name'=>'Código Cliente', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'text', 'field'=>'comentarios', 'name'=>'Comentários', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'cnpj', 'name'=>'ID Filial ou CPNJ Faturamento', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'text', 'field'=>'observacoes_contabilidade', 'name'=>'Observações Contabilidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'numero_os', 'name'=>'Número OS', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'numero_contrato', 'name'=>'Número Contrato', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'numero_linha_item', 'name'=>'Número Linha Item', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_item_sap', 'name'=>'Código Item SAP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'text', 'field'=>'descricao_item', 'name'=>'Descrição Item', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'numero_mac_serie', 'name'=>'Número MAC/Série', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_deposito', 'name'=>'Código Depósito', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'quantidade', 'name'=>'Quantidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'money', 'field'=>'valor_unitário', 'name'=>'Valor Unitário', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-file-code-o'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-file-code-o'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			
		]);
	}
}
