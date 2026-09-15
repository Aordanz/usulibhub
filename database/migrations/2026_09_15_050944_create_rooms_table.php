<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('category');
            $table->string('icon')->default('meeting_room');
            $table->string('location');
            $table->tinyInteger('floor');
            $table->integer('total_capacity');
            $table->text('description');
            $table->boolean('requires_letter')->default(false);
            $table->integer('min_participants')->nullable();
            $table->integer('max_duration_hours')->nullable();
            $table->boolean('is_reservable')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
