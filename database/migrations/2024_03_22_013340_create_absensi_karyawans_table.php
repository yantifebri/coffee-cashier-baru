<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaKaryawan');
            $table->date('tanggalMasuk');
            $table->time('waktuMasuk');
            $table->enum('status',['masuk','sakit','cuti']);
            $table->time('waktuKeluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_karyawan');
    }
};
