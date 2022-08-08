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
    {//join table form
       
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->string('sender_phone')->unique();
            $table->string('receiver_phone')->unique();
            $table->integer('package_value');
            $table->integer('quantity');
            $table->string('package_type');
            $table->string('addi_infor');
            $table->float('shipping', 9,2);
            $table->unsignedBigInteger('dep_branch_id');
            $table->unsignedBigInteger('des_branch_id');
            $table->string('actions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package');
    }
};
