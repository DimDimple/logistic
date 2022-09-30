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
            $table->string('sender_email')->nullable();
            $table->string('receiver_email')->nullable();
            $table->unsignedBigInteger('departure_id');
            $table->unsignedBigInteger('destination_id');
            $table->string('reference_number');
            $table->float('package_price', 8,2);
            $table->unsignedBigInteger('ptype_id');
            $table->float('delivery_charge',8,2);
            $table->string('product_description');
            $table->string('special_instruction');
            $table->string('status');
            $table->float('weight', 8,2);
            // $table->string('status');
            $table->string('pay_status');
            // $table->string('reference_number');
            $table->timestamps();

            $table->foreign('departure_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('ptype_id')->references('id')->on('p_types')->onDelete('cascade');


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
