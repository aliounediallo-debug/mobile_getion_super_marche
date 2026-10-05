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
            Schema::create('fournisseurs', function (Blueprint $table) {
                $table->id('id');
                $table->string('nom', 50);
                $table->string('telephone', 20);
                $table->string('email', 100)->nullable();
                $table->text('adresse')->nullable();
                $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
