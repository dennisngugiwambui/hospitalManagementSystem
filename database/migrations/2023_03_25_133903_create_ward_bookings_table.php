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
        Schema::create('ward_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('from');
            $table->string('doctor_name');
            $table->string('patient_phone');
            $table->string('next_of_kiln');
            $table->string('ticket_id');
            $table->string('to');
            $table->string('days');
            $table->string('price');
            $table->string('ward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ward_bookings');
    }
};
