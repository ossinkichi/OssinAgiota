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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->text('description')->nullable();
            $table->decimal('value', 15, 2)->default(0.00);
            $table->integer('installments')->default(1);
            $table->integer('date_of_paid');
            $table->decimal('paid_value', 15, 2)->default(0.00);
            $table->integer('installemnts_paid')->default(0);
            $table->string('status')->default('pendente');
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
