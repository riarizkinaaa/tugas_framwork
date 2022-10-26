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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('produk_id');
            $table->foreignId('kategori_id');
            $table->string('nama', 50);
            $table->string('deskripsi', 200);
            $table->decimal('harga', 9);
            $table->decimal('stok', 9);
            $table->foreign('kategori_id')->references('kategori_id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('produks');
    }
};
