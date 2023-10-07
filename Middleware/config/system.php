<?php

use App\Services\Modules\ModuleCustomersService;
use App\Services\Modules\ModuleFornecedoresService;
use App\Services\Modules\ModuleEstoqueService;
use App\Services\Modules\ModuleNotasFiscaisFaturamentoService;
use App\Services\Modules\ModuleRecebimentoService;
use App\Services\Modules\ModuleCiapAtivoService;
use App\Services\Modules\ModuleCiapDocumentoService;
use App\Services\Modules\ModuleCiapSaldoService;
use App\Services\Modules\ModuleContasReceberService;
use App\Services\Modules\ModuleComodatoService;
use App\Services\Modules\ModuleMovimentoEntradaService;
use App\Services\Modules\ModuleMovimentoSaidaService;

use App\Services\Submodules\Connectors\SubmoduleExcelService;
use App\Services\Submodules\Connectors\SubmoduleXmlService;
use App\Services\Submodules\Connectors\SubmoduleDatabaseService;

use App\Services\Submodules\Processors\SubmodulePrefixSulfixService;
use App\Services\Submodules\Processors\SubmoduleReplacerService;
use App\Services\Submodules\Processors\SubmoduleRegexService;
use App\Services\Submodules\Processors\SubmoduleTrimmerService;
use App\Services\Submodules\Processors\SubmoduleAcentuacaoService;
use App\Services\Submodules\Processors\SubmoduleExtractorService;

use App\Services\Submodules\Exporters\SubmoduleSapB1Files;

return [

	'modules'			=> [
		'clientes'			=> ModuleCustomersService::class,
		'fornecedores'		=> ModuleFornecedoresService::class,
		'estoque'			=> ModuleEstoqueService::class,
		'faturamento'		=> ModuleNotasFiscaisFaturamentoService::class,
		'recebimento'		=> ModuleRecebimentoService::class,
		'ciap_ativo'		=> ModuleCiapAtivoService::class,
		'ciap_documento'	=> ModuleCiapDocumentoService::class,
		'ciap_saldo'		=> ModuleCiapSaldoService::class,
		'contas_receber'	=> ModuleContasReceberService::class,
		'comodato'			=> ModuleComodatoService::class,
		'movimento_entrada'	=> ModuleMovimentoEntradaService::class,
		'movimento_saida'	=> ModuleMovimentoSaidaService::class,
	],
	'submodules'		=> [
		'connectors'		=> [
			'database'			=> SubmoduleDatabaseService::class,
			'excel'				=> SubmoduleExcelService::class,
			'xml'				=> SubmoduleXmlService::class,
		],
		'processors'		=> [
			'trimmer'			=> SubmoduleTrimmerService::class,
			'replacer'			=> SubmoduleReplacerService::class,
			'regex'				=> SubmoduleRegexService::class,
			'presulfix'			=> SubmodulePrefixSulfixService::class,
			'acentos'			=> SubmoduleAcentuacaoService::class,
			'extractor'			=> SubmoduleExtractorService::class,
		],
		'exporters'			=> [
			'sap_b1_files'		=> SubmoduleSapB1Files::class,
		],
	],
];