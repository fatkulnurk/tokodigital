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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('payment_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_memo')->nullable();
            $table->unsignedInteger('min_amount')->default(0);
            $table->unsignedInteger('max_amount')->default(0);
            $table->unsignedInteger('rate')->default(1); // in IDR, if USD change to 15000
            $table->boolean('is_with_random_amount')->default(false);
            $table->string('currency')->default('IDR');
            $table->unsignedInteger('fee_in_idr')->nullable();
            $table->decimal('fee_in_percent', 4, 2)->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('group');
            $table->string('provider');
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
        Schema::dropIfExists('payment_methods');
    }
};
