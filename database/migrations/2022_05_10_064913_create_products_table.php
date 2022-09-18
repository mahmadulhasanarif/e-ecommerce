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
            $table->id();
            $table->foreignId('cat_id');
            $table->foreignId('subcat_id');
            $table->foreignId('brand_id');
            $table->foreignId('unit_id');
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->integer('code');
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->string('image');
            $table->boolean('status')->default(true);
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
