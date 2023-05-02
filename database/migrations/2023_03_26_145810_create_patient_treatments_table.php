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
        Schema::create('patient_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('patient_name');
            $table->string('medicine_id');
            $table->string('price');
            $table->string('date');
            $table->string('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_treatments');
    }
};
