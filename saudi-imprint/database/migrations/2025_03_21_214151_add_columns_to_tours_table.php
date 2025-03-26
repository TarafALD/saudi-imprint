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
            $table->string('location')->nullable();
            $table->string('included')->nullable();
            $table->dateTime('date')->nullable();
            $table->foreignId('user_id')->constrained(); //constrained forces referential integriy

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('date');
            $table->dropColumn('included');
            $table->dropColumn('location');
            
        });
    }
};
