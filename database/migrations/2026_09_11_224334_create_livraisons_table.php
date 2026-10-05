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
         Schema::create('livraisons', function (Blueprint $table) {
            $table->id('id');
            $table->text('adresse');
            $table->dateTime('date_livraison')->nullable();
            $table->string('statut')->default('en_attente');
            $table->foreignId('commande_id')->unique()->constrained('commandes', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
