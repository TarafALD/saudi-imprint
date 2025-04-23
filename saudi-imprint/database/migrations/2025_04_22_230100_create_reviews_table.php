<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Tourist who left the review
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->foreignId('tour_guide_id')->constrained('_tour_guides')->onDelete('cascade');
            $table->integer('rating'); // 1-5 star rating
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};