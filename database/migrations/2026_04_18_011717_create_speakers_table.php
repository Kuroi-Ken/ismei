<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();         // e.g. "Assoc. Prof. Dr."
            $table->string('institution')->nullable();   // e.g. "University of Michigan"
            $table->string('country')->nullable();
            $table->string('photo')->nullable();         // path to stored image
            $table->text('bio')->nullable();             // biography text
            $table->text('presentation_title')->nullable();
            $table->text('presentation_abstract')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};