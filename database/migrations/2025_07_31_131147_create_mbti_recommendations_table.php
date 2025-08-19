<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mbti_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('mbti_type', 4); // Contoh: 'INTJ', 'ENFP', dst.
            $table->enum('category', ['employment', 'higher_education', 'entrepreneurship']);
            $table->unsignedBigInteger('category_id'); // ID dari tabel tujuan (job, uni, dsb)
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('mbti_recommendations');
    }
};
