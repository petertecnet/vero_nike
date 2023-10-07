<?php

namespace App\Services\Export;

use App\Models\Modules\Estoque;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Devolucao implements FromCollection, WithMapping, WithHeadings, WithEvents, ShouldAutoSize, WithStyles
{
	use Exportable;

	private $fileName = 'Devolucao.xlsx';
	private $writerType = Excel::XLSX;
	private $headers = [
		'Content-Type' => 'text/csv',
	];

	public function headings(): array
	{
		return array(
            [
                'LINHA 3 É CABEÇALHO DO ARQUIVO - NÃO REMOVER',
            ],
            [
                'CABEÇALHO',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                'LINHAS'
            ],
            [
                'ID',
                'DocEntry',
                'DocType',
                'AddressName',
                'DocDate',
                'DocDueDate',
                'TaxDate',
                'CardCode',
                'SequenceCode',
                'Comments',
                'BPL_IDAssignedToInvoice',
                'JrnlMemo',
                'SequenceSerial',
                'SeriesSTR',
                'SequenceModel',
                'ChaveAcesso',
                'NUM_OS',
                'NUM_CONT',
                'LineNum',
                'ItemCode',
                'ItemDescription',
                'MAC_SERIE',
                'WhsCode',
                'Usage',
                'Quantity',
                'UnitPrice',
                'TaxCode'
            ],
            [
                'ID',
                'DocEntry',
                'Tipo Documento	',
                'Nome Endereço',
                'Data Documento',
                'Data Vencimento',
                'Data Emissão',
                'Código Cliente',
                'Sequencia Numeração SAP',
                'Comentários',
                'ID Filial ou CPNJ Faturamento',
                'Observações Contabilidade',
                'Número Nota',
                'Série Nota',
                'Modelo Nota',
                'Chave de Acesso NFe',
            	'Número OS',
                'Número Contrato',
                'Número Linha Item',
                'Código Item SAP',
                'Descrição Item',
                'Número MAC/Série',
                'Código Depósito',
                'Utilização',
                'Quantidade',
                'Valor Unitário',
                'Código Imposto'

            ]
        );
	}

    public function collection()
    {
        return Estoque::all();
    }

    public function map($estoque): array
	{

            return [
                $estoque->id,
                null,
                $estoque->address_mame,
                $estoque->doc_date,
                $estoque->doc_due_date,
                $estoque->tax_date,
                $estoque->card_code,
                $estoque->sequence_code,
                $estoque->comments,
                $estoque->bpl_id_assigned_to_invoice,
                $estoque->jrnl_memo,
                $estoque->sequence_serial,
                $estoque->series_str,
                $estoque->sequence_model,
                $estoque->chave_acesso,
                $estoque->num_os,
                $estoque->num_cont,
                $estoque->LineNum,
                $estoque->item_code,
                $estoque->item_description,
                $estoque->mac_serie,
                $estoque->whs_code,
                $estoque->usage,
                $estoque->quantity,
                $estoque->unit_price,
                $estoque->tax_code
            ];
	}


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:AA1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('A2:R2')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFC000');

                $event->sheet->getDelegate()->getStyle('S2:AA2')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00B0F0');

                $event->sheet->getDelegate()->getStyle('A3:AA3')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('A4:AA4')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('D9E1F2');

                $event->sheet->mergeCells('A1:AA1');

                $event->sheet->mergeCells('A2:R2');

                $event->sheet->mergeCells('S2:AA2');

                $event->sheet->getDelegate()->getStyle('A:AA')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AA1')->getFont()->setBold(true);
        $sheet->getStyle('A2:R2')->getFont()->setBold(true);
        $sheet->getStyle('S2:AA2')->getFont()->setBold(true);
        $sheet->getStyle('A3:AA3')->getFont()->setBold(true);
        $sheet->getStyle('A4:AA4')->getFont()->setBold(true);

        $sheet->getStyle('A1:AA1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }
}
