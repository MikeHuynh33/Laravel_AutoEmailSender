<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns_recipients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaigns_id');
            $table->unsignedBigInteger('recipients_id');
            $table->timestamps();
            // Define foreign keys
            $table
                ->foreign('campaigns_id')
                ->references('id')
                ->on('campaigns')
                ->onDelete('cascade');
            $table
                ->foreign('recipients_id')
                ->references('id')
                ->on('recipients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns_recipients');
    }
};