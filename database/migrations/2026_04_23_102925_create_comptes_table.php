<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('id_type')->constrained('types', 'id_type')->restrictOnDelete();
            $table->string('numero_compte', 20)->unique();
            $table->enum('type_compte', ['client', 'partenaire']);
            $table->decimal('solde', 15, 2)->default(0.00);
            $table->string('devise', 10)->default('XOF');
            $table->enum('statut', ['actif', 'suspendu', 'bloque'])->default('actif');
            $table->string('numero_registre', 100);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
