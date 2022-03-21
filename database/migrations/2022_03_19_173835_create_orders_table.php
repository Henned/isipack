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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('Firma')->nullable();
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Email');
            $table->string('Straße');
            $table->string('Hausnummer');
            $table->string('Postleitzahl');
            $table->string('Ort');
            $table->boolean('read')->default(false);
            $table->enum('status',['Bestellt','Wird Geliefert', 'Wurde Geliefert','Storniert'])->default('Bestellt');
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
        Schema::dropIfExists('orders');
    }
};
