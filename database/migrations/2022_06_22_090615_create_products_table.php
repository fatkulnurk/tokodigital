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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('cluster')->nullable();
            $table->boolean('is_available_checking')->default(false);
            $table->string('category')->nullable();
            $table->string('category_slug')->nullable();
            $table->string('brand')->nullable();
            $table->string('brand_slug')->nullable();
            $table->string('type')->nullable();
            $table->string('type_slug')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('stock')->nullable();
            $table->boolean('is_multi')->default(true);
            $table->string('start_cut_off')->default(true);
            $table->string('end_cut_off')->default(true);
            $table->boolean('is_available')->default(false);
            $table->json('details')->nullable();
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
        Schema::dropIfExists('products');
    }
};
