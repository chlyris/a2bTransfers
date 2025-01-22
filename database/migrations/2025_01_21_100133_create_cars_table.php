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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->boolean('active')->default(true);
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->integer('km');
            $table->string('plate')->unique();
            $table->unsignedInteger('passenger_capacity');
            $table->unsignedInteger('trunk_capacity'); // in liters
            $table->string('e_pass')->nullable();
            $table->string('insurance')->nullable();
            $table->date('insurance_expiration')->nullable();
            $table->string('kteo')->nullable();
            $table->date('kteo_expiration')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
