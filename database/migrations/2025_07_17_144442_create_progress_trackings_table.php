<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('progress_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // relasi ke users
            $table->string('goal'); // tujuan misalnya "Kuliah di Jepang"
            $table->text('current_status')->nullable(); // kondisi sekarang
            $table->text('notes')->nullable(); // catatan dari siswa/admin
            $table->date('target_date')->nullable(); // target pencapaian
            $table->timestamps();

            // foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress_trackings');
    }
};
