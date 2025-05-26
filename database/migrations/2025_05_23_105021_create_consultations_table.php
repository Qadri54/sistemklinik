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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->text('description');
            $table->enum('status_konsultasi', ['belum dimulai','diproses', 'selesai'])->default('belum dimulai'); //ini akan berubah setelah dokter merubah status
            $table->enum('status_pembayaran', ['unpaid', 'paid'])->default('unpaid'); //ini akan berubah setelah pasein melakukan pembayaran
            $table->text('diagnosis')->nullable();  
            $table->integer('price')->nullable(); //ini akan diubah oleh dokter setelah pasien membuat konsultasi
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
