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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users');
            $table->string('payment_method_id')->constrained('payment_methods');
            $table->string('cluster')->default('prepaid'); // prepaid, postpaid
            $table->string('product_id'); // sku code
            $table->string('product_name');
            $table->unsignedBigInteger('product_price');
            $table->string('target'); // nomor pelanggan
            $table->unsignedTinyInteger('status');
            $table->string('sn')->nullable();
            $table->text('note')->nullable();
            $table->json('description')->nullable();
            $table->json('reply')->nullable(); // respon berhasil
            $table->string('reff_id')->nullable(); // id transaksi provider

            // notifikasi ke users (sementara tidak dipakai)
            $table->string('customer_contact')->nullable();
            $table->unsignedTinyInteger('cc_type')->nullable();

            $table->unsignedDecimal('created_at',  25,6)->nullable();
            $table->unsignedDecimal('updated_at',  25,6)->nullable();
            $table->unsignedDecimal('deleted_at',  25,6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
