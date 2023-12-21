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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('bussiness_name');
            $table->tinyInteger('bussiness_type')->default(0);
            $table->string('bussiness_location');
            $table->integer('total_employees');
            $table->text('business_emails')->nullable();
            $table->text('company_profile_url')->nullable();
            $table->text('business_logo_url')->nullable();
            $table->text('preferences')->nullable()->comment('json {domain, color, font, looks}');
            $table->text('pages')->nullable()->comment('array [homepage, contact, products, about_us, gallery, services, blog, faq, team, portofolio, careers, privacy_policy, terms_and_conditions, login_register, event_calendar]');
            $table->text('content_zip_url')->nullable();
            $table->text('content_platform')->nullable()->comment('array [instagram, facebook,x, linkedin]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
