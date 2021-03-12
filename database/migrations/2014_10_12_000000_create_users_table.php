<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('parent');
            $table->integer('group');
            $table->integer('settings_id')->unique();
            $table->string('settings_type');
            $table->string('login')->unique();
            $table->string('currency', 3);
            $table->string('language', 2);
            $table->float('cash', 12, 2);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('timezone');
            $table->string('password');
            $table->tinyInteger('online');
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
        Schema::dropIfExists('users');
    }
}
