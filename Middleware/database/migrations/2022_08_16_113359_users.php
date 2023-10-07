<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->json('permissions')->nullable();
		});

		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('profile_id')->nullable()->references('id')->on('profiles');
			$table->string('login')->unique();
			$table->string('avatar')->nullable();
			$table->string('name')->nullable();
			$table->string('email')->unique();

			$table->timestamps();
			$table->softDeletes();

			$table->timestamp('email_verified_atn')->nullable();
			$table->string('password');
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('profiles');
	}
}
