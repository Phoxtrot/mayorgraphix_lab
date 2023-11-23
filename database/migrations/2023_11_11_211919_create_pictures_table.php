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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('gallery_id')
            ->constrained('galleries')
            ->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->string('photo_id')->unique();
            $table->date('published_at')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
