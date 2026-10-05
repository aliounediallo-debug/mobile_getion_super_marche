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
         Schema::create('produits', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom', 50);
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->string('image', 255)->nullable();
            $table->integer('stock_min')->default(0);
            $table->boolean('etat')->default(true);
            $table->foreignId('categorie_id')->constrained('categories', 'categorie_id')->onDelete('restrict');
            $table->foreignId('fournisseur_id')->constrained('fournisseurs', 'fournisseur_id')->onDelete('restrict');
            $table->foreignId('promotion_id')->nullable()->constrained('promotions', 'promotion_id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
