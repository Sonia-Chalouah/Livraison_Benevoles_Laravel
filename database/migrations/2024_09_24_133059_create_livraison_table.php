<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraison', function (Blueprint $table) {
            $table->id('id_livraison'); // Clé primaire
            $table->unsignedBigInteger('benevole_id'); // Clé étrangère
            // Définir la clé étrangère
            $table->foreign('benevole_id')->references('id')->on('benevole')->onDelete('cascade');
            $table->date('date_livraison');
            $table->string('adresse_livraison');
            $table->enum('status', ['EN_COURS', 'TERMINEE', 'ANNULEE'])->default('EN_COURS');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livraison');
    }
};
