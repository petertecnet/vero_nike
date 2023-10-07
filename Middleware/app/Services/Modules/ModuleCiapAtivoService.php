<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\CiapAtivo;
use App\Services\Module;

class ModuleCiapAtivoService extends Module
{
	public $key				= 'ciap_ativo';
	public $name			= 'CIAP (Ativo Permanente)';
	public $description		= null;
	public $model			= CiapAtivo::class;
	public $fields			= [

		['type'=>'string', 'field'=>'codigo_ativo_sap', 'name'=>'Código do Ativo SAP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'status', 'name'=>'Status', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'data_aquisicao', 'name'=>'Data de Aquisição', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'numero_parcelas', 'name'=>'Número de Parcelas', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_bem', 'name'=>'Tipo do Bem', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'item_principal', 'name'=>'Item Principal', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_conta', 'name'=>'Código da Conta', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'código_centro_custo', 'name'=>'Código do Centro de Custo', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'função_bem', 'name'=>'Função do Bem', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'vida_util', 'name'=>'Vida útil', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'código_item_sap', 'name'=>'Código do Item SAP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'sequencial', 'name'=>'Sequencial', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			
		]);
	}
}
