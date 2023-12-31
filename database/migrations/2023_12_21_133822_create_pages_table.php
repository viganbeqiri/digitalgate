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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('contents')->nullable()->comment('json [{title, description, link?, image?}]');
            $table->boolean('has_slider')->default(0);
            $table->text('slider_contents')->nullable()->comment('json [{title, subtitle, link?, image?}]');
            $table->foreignId('parent_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
