<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('compte_id')->constrained();
            $table->enum('type', ['envoi', 'retrait', 'depot',]);
            $table->decimal('montant', 15, 2);
            $table->decimal('frais', 15, 2)->default(0.00);
            $table->decimal('montant_net', 15, 2)->storedAs('montant - frais');
            $table->string('devise', 10)->default('XOF');
            $table->enum('statut_transaction', ['en_attente', 'completee', 'echouee', 'annulee'])->default('en_attente');
            $table->timestamp('date_effectuee')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
