<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom', 25);
            $table->string('prenom', 25);
            $table->string('email', 191)->unique();
            $table->string('password', 100);
            $table->string('adresse');
            $table->date('date_naissance');
            $table->string('pays', 100);
            $table->string('numero_piece', 50);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
