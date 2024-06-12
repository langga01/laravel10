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
        Schema::create('rablist2s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('rab1_id')->constrained(
                table: 'rablist1s',
                indexName: 'posts_rab1_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rablist2s');
    }
};
