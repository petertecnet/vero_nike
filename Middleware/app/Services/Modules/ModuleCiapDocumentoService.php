<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\CiapDocumento;
use App\Services\Module;

class ModuleCiapDocumentoService extends Module
{
	public $key				= 'ciap_documento';
	public $name			= 'CIAP (Documentos Relacionados)';
	public $description		= null;
	public $model			= CiapDocumento::class;
	public $fields			= [

		['type'=>'string', 'field'=>'codigo_ativo_sap', 'name'=>'Código do Ativo SAP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'date', 'field'=>'data_documento', 'name'=>'Data do Documento', 'tooltip'=>null, 'placeholder'=>'Data do Documento', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'codigo_participante', 'name'=>'Código do Participante', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'chave_acesso', 'name'=>'Chave de Acesso', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'numero_nf', 'name'=>'Número da NF', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'serie', 'name'=>'Série', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'modelo', 'name'=>'Modelo', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'linha', 'name'=>'Linha', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'item_nf', 'name'=>'Item NF', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'quantidade', 'name'=>'Quantidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'unidade_medida', 'name'=>'Unidade de Medida', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'icms_operação_propria', 'name'=>'ICMS Operação Própria', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'icms_st', 'name'=>'ICMS-ST', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'icms_frete', 'name'=>'ICMS Frete', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'icms_diferencial_aliquota', 'name'=>'ICMS Diferencial de Alíquota', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_documento', 'name'=>'Tipo Documento', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'doc_cntry', 'name'=>'DocEntry', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-archive'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			
		]);
	}
}
