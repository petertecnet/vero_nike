<?php

namespace App\Services\Modules;

use Illuminate\Http\Request;

use App\Models\Modules\Cliente;
use App\Services\Module;

class ModuleClientesService extends Module
{
	public $key				= 'clientes';
	public $name			= 'Clientes';
	public $description		= null;
	public $model			= Cliente::class;
	public $fields			= [
		['type'=>'string', 'field'=>'codigo_cliente', 'name'=>'Código Cliente', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'nome_cliente', 'name'=>'Nome Cliente', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'nome_fantasia', 'name'=>'Nome Estrangeiro/Fantasia', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_cadastro', 'name'=>'Tipo de Cadastro', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'ddd', 'name'=>'DDD', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'telefone', 'name'=>'Telefone', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'email', 'name'=>'E-mail', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => true],
		['type'=>'string', 'field'=>'grupo_clientes', 'name'=>'Código Grupo de Clientes', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cnpj', 'name'=>'CNPJ', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'inscricao_estadual', 'name'=>'Inscrição Estadual', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'inscricao_municipal', 'name'=>'Inscrição Municipal', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cpf', 'name'=>'CPF', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_endereco_a', 'name'=>'Tipo Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'nome_endereco_a', 'name'=>'Nome Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_logradouro_a', 'name'=>'Tipo de Logradouro', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'endereco_a', 'name'=>'Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'numero_a', 'name'=>'Número', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'bairro_a', 'name'=>'Bairro', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cep_a', 'name'=>'CEP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'complemento_a', 'name'=>'Complemento', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cidade_a', 'name'=>'Cidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'estado_a', 'name'=>'Estado', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'pais_a', 'name'=>'País', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'indicador_inscricao_estadual', 'name'=>'Indicador Inscrição Estadual', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_endereco_b', 'name'=>'Tipo Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'nome_endereco_b', 'name'=>'Nome Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_logradouro_b', 'name'=>'Tipo de Logradouro', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'endereco_b', 'name'=>'Endereço', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'numero_b', 'name'=>'Número', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'bairro_b', 'name'=>'Bairro', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cep_b', 'name'=>'CEP', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'complemento_b', 'name'=>'Complemento', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'cidade_b', 'name'=>'Cidade', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'estado_b', 'name'=>'Estado', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'pais_b', 'name'=>'País', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_assinante', 'name'=>'Tipo de Assinante', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
		['type'=>'string', 'field'=>'tipo_cliente', 'name'=>'Tipo Cliente Com./Energia', 'tooltip'=>null, 'placeholder'=>'', 'description'=> null, 'columns'=>12, 'config'=>null, 'showOnList' => false],
	];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-users'];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-users'];

	public function ValidadeRequestPost (Request $request) : array
	{
		return $request->validate([
			
		]);
	}
}
