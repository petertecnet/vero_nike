<?php

namespace App\Services\Export;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
// MODULE EXCEL //
use Maatwebsite\Excel\Excel;
use App\Models\Company;
use App\Models\Modules\Recebimento as Model;

class Recebimento implements FromCollection, WithMapping
{
	use Exportable;

	private $fileName		= null;
	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	private $company		= null;

	public function __construct (Company $company)
	{
		$this->company = $company;
		$this->fileName = date('YmdHis') . 'SL_Template - Recebimento.xlsx';
	}

	public function map ($recebimento): array
	{
		return [
			@$recebimento['id_recebimento'],
            @$recebimento['doc_entry'],
            @$recebimento['U_G2_CARTEIRA'],
            @$recebimento['U_G2_BANCO'],
            @$recebimento['U_G2_AG'],
            @$recebimento['U_G2_CONTA'],
            @$recebimento['U_G2_CCONTABIL'],
         
			
		];
	}

	public function collection ()
	{
		return (new Collection([
			[
				'id_recebimento'				=> 'LINHA 3 É CABEÇALHO DO ARQUIVO - NÃO REMOVER',
				'doc_entry'						=> '',
                'U_G2_CARTEIRA'                 => '',
                'U_G2_BANCO'                    => '',
                'U_G2_AG'                       => '',
                'U_G2_CONTA'                    => '',
                'U_G2_CCONTABIL'                => '',
			],
			[
				'id_recebimento'				=> 'CABEÇALHO',
				'doc_entry'						=> '',
				'U_G2_CARTEIRA'                 => '',
                'U_G2_BANCO'                    => '',
                'U_G2_AG'                       => '',
                'U_G2_CONTA'                    => '',
                'U_G2_CCONTABIL'                => '',
			],
			[
				'id_recebimento'				=> 'ID',
				'doc_entry'						=> 'DocEntry',
				'U_G2_CARTEIRA'                 => 'Wallet',
                'U_G2_BANCO'                    => 'Bank',
                'U_G2_AG'                       => 'Bank Agency',
                'U_G2_CONTA'                    => 'Number Account',
                'U_G2_CCONTABIL'                => 'Accounting Situation',
			],
			[
				'id_recebimento'				=> 'ID',
				'doc_entry'						=> 'DocEntry',
				'U_G2_CARTEIRA'                 => 'Carteira',
                'U_G2_BANCO'                    => 'Banco',
                'U_G2_AG'                       => 'Agência',
                'U_G2_CONTA'                    => 'Conta Bancária',
                'U_G2_CCONTABIL'                => 'Situação Contábil',
			],
		]))->concat(Model::FromCompany($this->company)->OnlyNotExported()->get());
	}
}