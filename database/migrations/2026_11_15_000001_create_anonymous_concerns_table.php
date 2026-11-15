<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anonymous_concerns', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->nullable();
            $table->text('concern');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anonymous_concerns');
    }
};
