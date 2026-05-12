<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id('id_compte');
            $table->foreignId('role_id')->constrained('roles', 'id_role')->restrictOnDelete();
            $table->foreignId('id_type')->constrained('types', 'id_type')->restrictOnDelete();
            $table->string('numero_compte', 20)->unique();
            $table->enum('type_compte', ['client', 'partenaire']);
            $table->decimal('solde', 15, 2)->default(0.00);
            $table->string('devise', 10)->default('XOF');
            $table->enum('statut', ['actif', 'suspendu', 'bloque'])->default('actif');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('date_creat')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
