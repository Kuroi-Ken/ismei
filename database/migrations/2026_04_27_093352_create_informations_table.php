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
            $table->string('slug')->unique();  
            $table->string('label');         
            $table->string('type');          
            $table->string('title')->nullable();
            $table->longText('body')->nullable();  // TinyMCE rich content
            $table->string('release_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);   
            $table->timestamps();
        });
        
         Schema::table('informations', function (Blueprint $table) {
            $table->string('image')->nullable()->after('body');
        });
        
        Schema::table('informations', function (Blueprint $table) {
            // Make release_date auto-managed, keep nullable for legacy data
            $table->string('release_date')->nullable()->change();
            // Add second image column for additional images below body
            $table->string('image2')->nullable()->after('image');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('informations');
        Schema::table('informations', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        Schema::table('informations', function (Blueprint $table) {
            $table->string('release_date')->nullable()->change();
            $table->string('image2')->nullable()->after('image');
        });

    }
};