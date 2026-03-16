<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whats_new_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');        
            $table->string('caption')->nullable(); 
            $table->integer('order')->default(0);  
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whats_new_images');
    }
};