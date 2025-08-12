<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('due at')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // crio novo id
            $table->foreign('user_id')->references('id')->on('users'); // associo novo id a uma chave estrangeira // ao criar uma classe, devo considerar apagar dados em cascata - isto significa que se um user por exemplo for apagado, tudo o que está associado a ele é apagado também sem impedimento. Para isso só tenho que adicionar aqui ->delete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
