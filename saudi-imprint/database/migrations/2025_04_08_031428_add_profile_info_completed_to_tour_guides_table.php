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
            
            $table->boolean('profile_info_completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_tour_guides', function (Blueprint $table) {
            //
            $table->dropColumn('profile_info_completed');
        });
    }
};
