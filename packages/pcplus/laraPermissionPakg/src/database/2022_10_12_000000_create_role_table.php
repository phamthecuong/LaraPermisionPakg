<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gurd_name')->nullable();
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gurd_name')->nullable();
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('role_has_permission', function (Blueprint $table) {
            $table->integer('permission_id');
            $table->integer('role_id');
        });

        Schema::create('user_has_permission', function (Blueprint $table) {
            $table->integer('permission_id');
            $table->integer('user_id');
        });

        Schema::create('user_has_role', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('user_id');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_has_permission');
        Schema::dropIfExists('user_has_permission');
        Schema::dropIfExists('user_has_role');
    }
}
