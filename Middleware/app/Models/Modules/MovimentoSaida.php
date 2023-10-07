<?php 

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;


class MovimentoSaida extends Model
{
	protected $table = 'module_movimento_saida';
	protected $fillable = ['id_movimento','data_documento','codigo_cliente','comentarios','cnpj','observacoes_contabilidade','numero_os','numero_contrato','numero_linha_item','codigo_item_sap','descricao_item','codigo_deposito','quantidade','valor_unitário'];

	public function scopeOnlyNotExported ($query)
	{
		return $query->where('exported', 0);
	}

    public function scopeFromCompany ($query, Company $company)
	{
		return $query->where('company_id', $company->id);
	}

}
