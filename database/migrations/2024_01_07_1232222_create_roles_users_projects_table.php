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
        Schema::create('roles_users_projects', function (Blueprint $table) {

            $table->integer('project_role')->unsigned();
            $table->foreign('project_role')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete();

            $table->integer('project_user')->unsigned();
            $table->foreign('project_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_users_projects');
    }
};
