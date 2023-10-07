<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\CiapSaldo;
use App\Services\Module;

class ModuleCiapSaldoService extends Module
{
	public $key				= 'ciap_saldo';
	public $name			= 'CIAP (Saldo Inicial)';
	public $description		= null;
	public $model			= CiapSaldo::class;
	public $fields			= [

		['type'=>'string', 'field'=>'codigo_ativo_sap', 'name'=>'Código do Ativo SAP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'parcela', 'name'=>'Parcela', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'data_credito', 'name'=>'Data do Crédito', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'saldo_icms', 'name'=>'SaldoICMS', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'total_saidas', 'name'=>'Total de Saídas', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'saídas_tributadas_exportacao', 'name'=>'Saídas Tributadas e Exportação', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'indice_apropriacao', 'name'=>'Indice de Apropriação', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'valor_parcela', 'name'=>'Valor da Parcela', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'valor_apropriado_parcela', 'name'=>'Valor Apropriado da Parcela', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			
		]);
	}
}
