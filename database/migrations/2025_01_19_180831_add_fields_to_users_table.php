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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable(false);
            $table->string('whatsapp')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('passport_id')->nullable(false);
            $table->string('avatar')->nullable(false);
            $table->enum('type', ['admin', 'driver', 'client'])->default('client')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 
                'whatsapp', 
                'country', 
                'city', 
                'address', 
                'passport_id', 
                'avatar', 
                'type'
            ]);
        });
    }
};
