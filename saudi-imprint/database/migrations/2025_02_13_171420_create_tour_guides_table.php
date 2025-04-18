<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /
    //  * Run the migrations.
    //  */
    public function up(): void
    {
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('license_number');
            $table->enum('status', ['pending_verification', 'verified', 'rejected'])
            ->default('pending_verification');

            $table->text('bio')->nullable();
            $table->string('skills')->nullable();
            $table->string('languages')->nullable();
            $table->string('ROO')->nullable(); //region of operation
            $table->integer('years_experience')->nullable();
            $table->string('prefrences')->nullable();
            $table->timestamps();
        });
    }

    // /
    //  * Reverse the migrations.
    //  */
    public function down(): void
    {
        Schema::dropIfExists('_tour_guide');
    }
};

