<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\Recebimento;
use App\Services\Module;

class ModuleRecebimentoService extends Module
{
	public $key				= 'recebimento';
	public $name			= 'Recebimento';
	public $description		= null;
	public $model			= Recebimento::class;
	public $fields			= [

		['type'=>'string', 'field'=>'U_G2_CARTEIRA', 'name'=>'Carteira do Cliente', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'U_G2_BANCO', 'name'=>'Banco do Cliente', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'U_G2_AG', 'name'=>'Agência', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'U_G2_CONTA', 'name'=>'Número da Conta', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'U_G2_CCONTABIL', 'name'=>'Situção Contábil', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-users'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-users'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			'U_G2_CARTEIRA'	=> 'required',
		]);
	}
}