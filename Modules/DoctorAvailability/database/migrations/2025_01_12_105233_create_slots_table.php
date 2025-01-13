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
        Schema::create(
            'slots', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('doctor_id');
                $table->timestamp('time');
                $table->boolean('is_reserved')->default(0);
                $table->decimal('cost', 8, 2);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
