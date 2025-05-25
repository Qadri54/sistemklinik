<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('specialization', [
                'Umum',
                'Anak',
                'Penyakit Dalam',
                'Bedah',
                'Gigi',
                'Saraf',
                'Kandungan',
                'Kulit & Kelamin',
                'Jantung',
                'Paru-paru',
                'Mata',
                'THT',
                'Psikiatri',
                'Ortopedi',
                'Urologi',
                'Gizi Klinik',
                'Geriatri',
                'Anestesi',
                'Radiologi',
                'Patologi Klinik',
            ]);
            $table->string('license_number')->unique(); // No STR
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('doctors');
    }
};
