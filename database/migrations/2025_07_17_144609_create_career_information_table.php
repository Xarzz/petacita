<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('career_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // relasi ke users
            $table->string('career_type'); // contoh: kerja, kuliah, wirausaha, beasiswa
            $table->string('specific_goal')->nullable(); // contoh: Bank BRI, Universitas Tokyo, Startup kuliner
            $table->text('description')->nullable(); // deskripsi tambahan
            $table->timestamps();

            // foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_information');
    }
};
