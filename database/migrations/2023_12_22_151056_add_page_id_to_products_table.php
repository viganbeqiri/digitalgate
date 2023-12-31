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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('page_id')->after('category_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->string('slug')->after('page_id');
            $table->boolean('highlighted')->default(0);
            $table->tinyInteger('pricing_scheme')->default(1)->comment('1 => outright, 2 => monthly subscription, 3 => quote');
            $table->text('image')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('page_id');
            $table->dropColumn('slug');
            $table->dropColumn('highlighted');
            $table->dropColumn('pricing_scheme');
            $table->dropColumn('image');
            $table->dropColumn('note');
        });
    }
};
