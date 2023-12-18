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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('price')->default(0);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->json('additional_info')->nullable();
            $table->tinyInteger('is_mandatory');
            $table->foreignId('bundle_with_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->text('template_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
