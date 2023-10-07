<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCompany extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_companies', function (Blueprint $table) {
			$table->bigInteger('user_id')->references('id')->on('users');
			$table->bigInteger('company_id')->references('id')->on('companies');
			$table->primary(['user_id', 'company_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users_companies');
	}
}
