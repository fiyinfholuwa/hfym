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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('husband_name');
            $table->string('wife_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('marriage_years');
            $table->string('church');
            $table->string('coming_type');
            $table->text('expectations')->nullable();
            $table->text('prayer_requests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
