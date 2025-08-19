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
    Schema::table('mbti_results', function (Blueprint $table) {
        $table->string('mbti_title')->nullable()->change();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
