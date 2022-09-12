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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('sender_phone');
            $table->string('receiver_phone');
            $table->unsignedBigInteger('departure_id');
            $table->unsignedBigInteger('destination_id');
            $table->float('total_fee',8,2);
            $table->integer('total_item');
            // $table->string('status');
            $table->string('pay_status');
            // $table->string('reference_number');
            $table->timestamps();

            $table->foreign('departure_id')->references('id')->on('branches');
            $table->foreign('destination_id')->references('id')->on('branches');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
