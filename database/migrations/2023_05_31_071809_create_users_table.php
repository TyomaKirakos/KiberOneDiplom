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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('login')->unique();
            $table->date('birthdate');
            $table->enum('gender', ['мужской', 'женский'])->default('мужской');
            $table->integer('money')->default(0);
            $table->enum('role', ['ученик', 'тьютор', 'менеджер'])->default('ученик');
            $table->foreignId('group_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('contact');
            $table->string('password');
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
};
