<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function(Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->bigInteger('permission_id')->unsigned()->nullable();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            // $table->integer('role_id')->unsigned();
            // $table->integer('permission_id')->unsigned();

            $table->primary(['role_id', 'permission_id']);

            // $table->foreign('role_id')
            //         ->references('id')
            //         ->on('roles')
            //         ->onDelete('cascade');

            // $table->foreign('permission_id')
            //         ->references('id')
            //         ->on('permissions')
            //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission');
    }
};
