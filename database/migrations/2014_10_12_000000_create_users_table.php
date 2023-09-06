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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('role')->default(0);
            $table->timestamps();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('user_profiles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('tel');
                $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('version');
            $table->string('category');
            $table->string('number_car')->unique();
            $table->string('colors')->nullable();
            $table->string('detail')->nullable();
            $table->string('price');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->timestamps();
    });

    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('users_id');
        $table->unsignedBigInteger('cars_id');
        $table->string('start');
        $table->string('end');
        $table->string('all_price');
        $table->string('number_id_img');
        $table->string('car_id_img');
        $table->string('slip_id_img');
        $table->string('date');
        $table->string('status')->default(0);
        $table->foreign('users_id')->references('id')->on('user_profiles');
        $table->foreign('cars_id')->references('id')->on('cars');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('bookings');
    }
};
