<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobss', function (Blueprint $table) {
            $table->id(); // kolom id (auto increment)
            $table->string('title'); // kolom title
            $table->text('description')->nullable(); // kolom description
            $table->string('mbti_type'); // kolom mbti_type (misal INFP)
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
