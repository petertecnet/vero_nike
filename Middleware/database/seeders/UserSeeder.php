<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use DB;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory(30)->create();
		User::create([
			'login'		=> 'admininstrator',
			'name'		=> 'Administrator',
			'password'	=> 'admin',
			'email'		=> 'admin_middleware@vero.com',
		]);

		User::create([
			'name' => 'Pedro',
			'login' => 'pivow@vero.com',
			'email' => 'pivow@vero.com',
			'password' => '123456',
		]);

		User::create([
			'name' => 'Arthur',
			'login' => 'Arthur@vero.com',
			'email' => 'Arthur@vero.com',
			'password' => '123456',
		]);

		User::create([
			'name' => 'Gabriel',
			'login' => 'Gabriel@vero.com',
			'email' => 'Gabriel@vero.com',
			'password' => '123456',
		]);

		User::create([
			'name' => 'Fabio',
			'login' => 'Fabio@vero.com',
			'email' => 'Fabio@vero.com',
			'password' => '123456',
		]);

		User::create([
			'name' => 'Dheison',
			'login' => 'Dheison@vero.com',
			'email' => 'Dheison@vero.com',
			'password' => '123456',
		]);
		User::create([
			'name' => 'Gleison',
			'login' => 'Gleison@vero.com',
			'email' => 'Gleison@vero.com',
			'password' => '123456',

		]);
		//adicionado raquel
		User::create([
			'name' => 'Raquel',
			'login' => 'Raquel@vero.com',
			'email' => 'Raquel@vero.com',
			'password' => '123456',
		]);

		//USUARIO TESTE PADRÃO

		User::create([
			'name' => 'usuario',
			'login' => 'usuario@vero.com',
			'email' => 'usuario@vero.com',
			'password' => '123456',
		]);
	}
}
