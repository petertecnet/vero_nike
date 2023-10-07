<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\Comodato;
use App\Services\Module;

class ModuleComodatoService extends Module
{
	public $key				= 'comodato';
	public $name			= 'Comodato';
	public $description		= null;
	public $model			= Comodato::class;
	public $fields			= [

		['type'=>'string', 'field'=>'quantidade', 'name'=>'Quantidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'money', 'field'=>'valor_unitario', 'name'=>'Valor Unitário', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_imposto', 'name'=>'Código Imposto', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-expand'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-expand'];
}
