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
        Schema::create('rablist3s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('rab2_id')->constrained(
                table: 'rablist2s',
                indexName: 'posts_rab2_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rablist3s');
    }
};
