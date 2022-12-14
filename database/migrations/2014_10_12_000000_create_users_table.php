<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('image')->default('user.png');
            // $table->unsignedBigInteger('branch_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            // $table->foreign('branch_id')->references('id')->on('branches');

        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
