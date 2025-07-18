<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');         // FK ke tabel users
            $table->string('goal_category');               // kategori: kerja / kuliah / beasiswa / wirausaha
            $table->string('goal_title');                  // contoh: "Kerja di Bank BRI" atau "Kuliah di Jepang"
            $table->text('description')->nullable();       // penjelasan lebih lanjut
            $table->date('deadline')->nullable();          // target waktu capai tujuan
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');  // status goal
            $table->timestamps();

            // foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
