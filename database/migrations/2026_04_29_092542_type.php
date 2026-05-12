<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id('id_type');
            $table->string('nom', 50)->unique(); // ex: 'client', 'partenaire'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
