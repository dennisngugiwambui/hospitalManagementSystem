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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            // $table->string('patient_id');
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('date');
            $table->string('ticket_id');
            $table->string('comment');
            $table->string('lab_comment');
            $table->string('medicines');
            $table->string('clinics');
            $table->string('appointment');
            $table->string('ward_number');
            $table->string('payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
