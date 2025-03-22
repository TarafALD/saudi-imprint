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
        Schema::table('tours', function (Blueprint $table) {
            $table->json('type_of_tour')->nullable()->change();
            $table->decimal('price')->nullable()->change();
            $table->integer('duration')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('included')->nullable()->change();
            $table->dateTime('date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->json('type_of_tour')->nullable(false)->change();
            $table->decimal('price')->nullable(false)->change();
            $table->integer('duration')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
            $table->string('included')->nullable(false)->change();
            $table->dateTime('date')->nullable(false)->change();
        });
    }
};
