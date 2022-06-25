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
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transaction_id')->constrained('transactions');
            $table->string('reff_id')->nullable(); // id pembayaran
            $table->string('currency')->default('IDR');
            $table->string('payment_name')->nullable();
            $table->string('payment_number')->nullable();
            $table->text('payment_url')->nullable();
            $table->unsignedDecimal('unique_amount', 25,8)->nullable();
            $table->unsignedDecimal('fee', 25,8)->nullable();
            $table->unsignedDecimal('total', 25,8);

            $table->unsignedDecimal('expired_at',  25,6)->nullable();
            $table->unsignedDecimal('paid_at',  25,6)->nullable();

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
        Schema::dropIfExists('transaction_payments');
    }
};
