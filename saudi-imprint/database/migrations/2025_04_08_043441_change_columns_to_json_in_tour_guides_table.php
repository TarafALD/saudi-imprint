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
        Schema::table('_tour_guides', function (Blueprint $table) {
            //
            $table->json('languages')->nullable()->change();
            $table->json('prefrences')->nullable()->change();
            $table->json('ROO')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_tour_guides', function (Blueprint $table) {
            //
            $table->dropColumn('languages');
            $table->dropColumn('prefrences');
            $table->dropColumn('ROO');
        });
    }
};
