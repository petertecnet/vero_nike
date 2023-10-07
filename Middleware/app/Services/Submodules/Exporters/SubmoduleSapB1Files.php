<?php

namespace App\Services\Submodules\Exporters;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

use StdClass;
use Exception;
use App\Services\Module;
use App\Services\SubmoduleExporter;

use App\Services\Submodules\Exporters\SubmoduleSapB1Files\Customer;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\Faturamento;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\CiapAtivo;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\CiapDocumento;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\CiapSaldo;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\Comodato;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\MovimentoEntrada;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\MovimentoSaida;
use App\Services\Submodules\Exporters\SubmoduleSapB1Files\Recebimento;

class SubmoduleSapB1Files extends SubmoduleExporter
{
	public $key				= 'sap_b1_files';
	public $name			= 'Arquivos do SAP B1';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.sapb1_config',
		'process'				=> '',
	];

	private $templates		= [
		'clientes'				=> Customer::class,
		'fornecedores'			=> Customer::class,
		'faturamento'			=> Faturamento::class,
		'contas_receber'		=> Faturamento::class,
		'ciap_ativo'			=> CiapAtivo::class,
		'ciap_documento'		=> CiapDocumento::class,
		'ciap_saldo'			=> CiapSaldo::class,
		'comodato'				=> Comodato::class,
		'movimento_entrada'		=> MovimentoEntrada::class,
		'movimento_saida'		=> MovimentoSaida::class,
		'recebimento'			=> Recebimento::class,

		#'estoque'				=> null,
	];

	public function Execute (Collection $collection, Module $module)
	{
		$template = $this->GetTemplate($module);

		$export = new $template($collection);
		$filename = 'export_' . date('YmdHis') . '.xlsx';
		$folder = 'exports';
		$filepath = Storage::path($folder);

		if (!$export->store($folder . DIRECTORY_SEPARATOR . $filename))
			throw new Exception('Não foi possível armazenar o arquivo exportado. Tente novamente e se o problema persistir entre em contat com a administração');

		return ['filename' => $filename, 'filepath' => $filepath];
	}

	public function CanExportForModule (Module $module) : bool
	{
		return isset($this->templates[$module->key]) && !is_null($this->templates[$module->key]);
	}

	private function GetTemplate (Module $module)
	{
		if (!$this->CanExportForModule($module))
			throw new Exception('Não existe template de exportação disponível para este módulo');

		return $this->templates[$module->key];
	}
}