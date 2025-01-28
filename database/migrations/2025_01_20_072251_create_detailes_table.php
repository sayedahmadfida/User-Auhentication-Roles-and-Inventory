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
        Schema::create('detailes', function (Blueprint $table) {
            $table->id();
            $table->string('storage');
            $table->string('color');
            $table->string('battery');
            $table->double('price', 11, 2);
            $table->double('quantiry', 11, 2);
            $table->double('total', 11, 2);
            $table->integer('product_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailes');
    }
};
