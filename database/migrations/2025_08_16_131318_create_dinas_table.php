<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('dinas', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('location');
        $table->decimal('rating', 2, 1)->nullable();
        $table->integer('students')->nullable();
        $table->integer('graduate_rate')->nullable();
        $table->integer('match')->nullable();
        $table->json('programs')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinas');
    }
};
