<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->integer('id');
                $table->primary('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->text('address');
                $table->string('phone');
                $table->string('email');
                $table->datetime('created_at');
                $table->datetime('updated_at');
                $table->datetime('deleted_at')->nullable();
                $table->engine = "InnoDB";
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
