<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->nullable();
            $table->integer('department_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('priority');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('progress')->default('0');
            $table->text('result')->nullable();
            $table->string('file')->nullable();
            $table->integer('status')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
