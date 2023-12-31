
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
        Schema::create('order_incubation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('founder_name');
            $table->string('co_founder_name');
            $table->text('founder_portofolio_url');
            $table->text('co_founder_portofolio_url');
            $table->string('idea_age');
            $table->string('market_analyst');
            $table->string('market_analyst_url');
            $table->string('market_strategy');
            $table->string('exit_strategy');
            $table->string('org_chart');
            $table->string('org_chart_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_incubation_details');
    }
};
