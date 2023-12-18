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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->tinyInteger('status')->default(0)->comment('0 = candidate, 1 = pending, 2 = completed, 3 = canceled');
            $table->tinyInteger('is_bundle')->default(0);
            $table->tinyInteger('service_type')->default(0)->comment('1: development, 2: design, 3: incubator, 4: outsourcing');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
