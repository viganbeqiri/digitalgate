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
        Schema::create('order_incubation_decks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('startup_name');
            $table->tinyInteger('request_type')->default(0)->comment('0 => mentorship & networking, 1 => infrastructure support, 2 => funding support');
            $table->text('budget_url');
            $table->boolean('has_bussiness_license')->default(0);
            $table->text('bussiness_license_url')->nullable();
            $table->text('presentation_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_incubation_applications');
    }
};
