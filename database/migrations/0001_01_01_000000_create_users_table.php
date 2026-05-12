<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('id_utilisateur');
            $table->foreignId('compte_id')->unique()->constrained('comptes', 'id_compte')->cascadeOnDelete();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('email', 191)->unique();
            $table->string('password', 255);
            $table->string('telephone', 20)->unique();
            $table->text('adresse')->nullable();
            $table->enum('type', ['client', 'partenaire']);
            $table->date('date_naissance')->nullable();
            $table->string('pays', 100)->nullable();
            $table->string('numero_piece', 50)->nullable();
            // Champs spécifiques partenaire
            $table->string('raison_sociale', 191)->nullable();
            $table->string('numero_registre', 100)->nullable();
            $table->decimal('taux_commission', 5, 2)->default(0.00);
            $table->string('logo', 255)->nullable();
            $table->timestamp('date_creat')->useCurrent();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
