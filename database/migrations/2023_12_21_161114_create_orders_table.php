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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_no');
            $table->tinyInteger('status')->default(0)->comment('0 = draft, 1 = pending, 2 = processing, 3 = completed');
            $table->tinyInteger('payment_status')->default(0)->comment('0 = pending, 1 = paid');
            $table->tinyInteger('current_step')->default(0);
            $table->tinyInteger('order_type')->default(0)->comment('0 = service, 1 = incubation');
            $table->tinyInteger('service_type')->nullable()->default(0)->comment('0 = development, 1 = design');
            $table->decimal('tax', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('voucher_code')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('city');
            $table->string('zip_code');
            $table->string('address');
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
