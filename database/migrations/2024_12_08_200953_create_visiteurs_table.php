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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Prénom');
            $table->date('Naiss');
            $table->string('Lieu');
            $table->enum('Sexe', ['Homme', 'Femme']);
            $table->string('diplôme');
            $table->string('fonction');
            $table->string('tel');
            $table->string('mail')->unique();
            $table->foreignId('idlocalite')->constrained('localites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteurs');
    }
};
