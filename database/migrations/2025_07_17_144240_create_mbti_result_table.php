<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mbti_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // relasi ke users
            $table->string('mbti_type'); // contoh: INFP, ESTJ
            $table->text('description')->nullable(); // penjelasan tentang tipe ini
            $table->timestamp('taken_at')->nullable(); // kapan tes dilakukan
            $table->timestamps();

            // foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mbti_results');
    }
};
