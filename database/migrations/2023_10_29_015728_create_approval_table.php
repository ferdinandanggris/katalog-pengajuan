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
        Schema::create('approval', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pengajuan'); // baru / modifikasi

            $table->string('no');
            $table->string('stock_code');

            $table->string('jenis_item');
            $table->string('item');
            $table->text('json_data');

            $table->string('egi');
            $table->string('component_code');

            $table->string('manufacturer');
            $table->string('part_number');
            $table->string('recd_part_no');

            $table->string('stock_type');

            $table->string('penyedia_yang_disarankan');
            $table->string('harga_perkiraan');
            $table->string('pemakaian_per_tahun');
            $table->string('gudang_yang_diperlukan');
            $table->string('satuan');


            $table->string('dibatasi_untuk');
            $table->string('cross_reff');
            $table->string('inspeksi_khusus');

            $table->string('kritikalitas');
            $table->string('berbahaya');

            $table->string('catatan_penghapusan');
            $table->string('catatan_penghapusan_teks');

            $table->integer('setuju')->default(0);

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval');
    }
};
