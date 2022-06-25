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
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('studID',20) ->unique();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('MI');
            $table->string('course');
            $table->string('yearlevel');
            $table->string('userlevel') ->default('User');
            $table->string('Status', 64)->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
