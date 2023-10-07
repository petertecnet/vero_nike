<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logs extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//log_import
		Schema::create('log_import', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamp('date')->useCurrent();
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->unsignedInteger('user_id')->references('id')->on('profiles');
			$table->unsignedTinyInteger('purged')->default(0);
			$table->string('module', 50)->nullable();

			$table->index('module');
		});
		
		//log_export
		Schema::create('log_export', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamp('date')->useCurrent();
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->unsignedInteger('user_id')->references('id')->on('profiles');
			$table->unsignedTinyInteger('purged')->default(0);
			$table->string('module', 50)->nullable();
			$table->string('filename')->nullable();
			$table->string('filepath')->nullable();
			
			$table->index('module');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('log_import');
		Schema::dropIfExists('log_export');
	}
}
