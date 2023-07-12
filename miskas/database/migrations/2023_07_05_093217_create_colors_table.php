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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color', 7);
            $table->unsignedTinyInteger('rate')->default(1);

            // lenteliu surisimas. Autorius is pagrindines lenteles surisimas su autoriumi is autoriu lenteles
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
