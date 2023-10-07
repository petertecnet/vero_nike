<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Profile::create([
			'name' => 'Administrador',
			'permissions' => [
				"company_create","company_config","user_create","user_config","profile_create","profile_config","data_import","data_export","data_edit","data_purge"
			],
		]);

		Profile::create([
			'name' => 'Gerente',
			'permissions' =>[
				"company_create","company_config","user_create","data_import","data_export","data_edit","data_purge"
			],
		]);

		Profile::create([
			'name' => 'Comprador',
			'permissions' => [
				"company_create","company_config","data_import","data_export","data_edit","data_purge"
			],
		]);
	}
}
