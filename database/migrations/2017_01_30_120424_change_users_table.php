<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            
            $table->string('email', 170)->change();
            $table->string('role')->default('client');

            $table->string('provider')->nullable();
            $table->string('provider_id', 150)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->change();

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');            
            $table->dropColumn('role');

            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
        });
    }
}
