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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->float('package_price', 8,2);
            $table->unsignedBigInteger('ptype_id');
            $table->float('fee',8,2);
            $table->string('message');
            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('ptype_id')->references('id')->on('p_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
};
