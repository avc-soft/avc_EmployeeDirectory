<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('password')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->integer('position_id')->unsigned()->nullable()->index('position_idx');
			$table->integer('boss_id')->unsigned()->nullable()->index('users_idx');
			$table->timestamp('hired_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('salary')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
