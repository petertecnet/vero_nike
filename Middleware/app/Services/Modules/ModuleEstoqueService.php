<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\Estoque;
use App\Services\Module;

class ModuleEstoqueService extends Module 
{
	public $key				= 'estoque';
	public $name			= 'Estoque';
	public $description		= null;
	public $model			= Estoque::class;
	public $fields			= [

		['type'=>'string', 'field'=>'address_mame', 'name'=>'Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'date', 'field'=>'doc_date', 'name'=>'Data do documento', 'tooltip'=>null, 'placeholder'=>'Data do documento', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'date', 'field'=>'doc_due_date', 'name'=>'Data de emissão', 'tooltip'=>null, 'placeholder'=>'Data de emissão', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'date', 'field'=>'tax_date', 'name'=>'Data de vencimento', 'tooltip'=>null, 'placeholder'=>'Data de vencimento', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'card_code', 'name'=>'Código do cartão', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'sequence_code', 'name'=>'Código sequencial', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'comments', 'name'=>'Comentarios', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'bpl_id_assigned_to_invoice', 'name'=>'Assinatura do pedido', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'jrnl_memo', 'name'=>'Jrnl memo', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'sequence_serial', 'name'=>'Serial', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'series_str', 'name'=>'Series str', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'sequence_model', 'name'=>'Modelo sequencial', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'chave_acesso', 'name'=>'Chave de acesso', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'num_os', 'name'=>'Numero da OS', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'Nota fiscal', 'name'=>'Nota fiscal', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'num_cont', 'name'=>'num_cont', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'LineNum', 'name'=>'LineNum', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'item_code', 'name'=>'Código do item', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'item_description', 'name'=>'Descrição do item', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'mac_serie', 'name'=>'Serial MAC', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'whs_code', 'name'=>'Whs code', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'usage', 'name'=>'Usage', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'quantity', 'name'=>'Quantidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'unit_price', 'name'=>'Valor unitário', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'tax_code', 'name'=>'Taxa', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-th-large'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-th-large'];

	public function ValidadeRequestPost (Request $request) : array
{
		return $request->validate([
			'address_mame'						=> 'required',
		]);
	}
}
