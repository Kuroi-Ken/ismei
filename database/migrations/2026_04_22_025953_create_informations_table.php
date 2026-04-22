<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // 'call_for_submission' | 'schedule' | 'announcement_1' | 'announcement_2' | 'announcement_3'
            $table->string('label');          // human-readable label for admin UI
            $table->string('type');           // 'fixed' (always shown) | 'optional' (hidden if empty)
            $table->string('title')->nullable();
            $table->longText('body')->nullable();  // TinyMCE rich content
            $table->string('release_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};