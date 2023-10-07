<?php

namespace App\Services\Export;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class Template implements FromCollection
{
	use Exportable;

	private $fileName = 'invoices.xlsx';
	private $writerType = Excel::XLSX;
	private $headers = [
		'Content-Type' => 'text/csv',
	];

	public function collection()
	{
		return new Collection([
			['Arthur', 'agtesti@stefanini.com'],
			['Gabriel', 'gclopes@stefanini.com'],
		]);
	}
}