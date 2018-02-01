<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddEmployeeFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer('position_id')->unsigned()->default(0);
            $table->integer('boss_id')->unsigned()->default(0);
            $table->dateTime('hired_at')->nullable();
            $table->integer('salary')->default(0);

            $table->foreign('position_id')->references('id')->on('positions');
            $table->index('boss_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropIndex(['boss_id']);
            $table->dropForeign(['position_id']);

            $table->dropColumn([
                'position_id',
                'boss_id',
                'hired_at',
                'salary'
            ]);
        });
    }
}
