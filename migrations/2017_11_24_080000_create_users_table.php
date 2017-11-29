<?php

use \Neutrino\Database\Migrations\Migration;
use \Neutrino\Database\Schema\Builder;
use \Neutrino\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param \Neutrino\Database\Schema\Builder $schema
     *
     * @return void
     */
    public function up(Builder $schema)
    {
        $schema->create('users', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param \Neutrino\Database\Schema\Builder $schema
     *
     * @return void
     */
    public function down(Builder $schema)
    {
        $schema->dropIfExists('users');
    }
}
