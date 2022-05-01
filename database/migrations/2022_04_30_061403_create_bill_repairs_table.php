<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('code_bill')->nullable();
            $table->integer('booking_detail_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->bigInteger('sum_price')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('debt')->comment('nợ')->nullable();
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
        Schema::dropIfExists('bill_repairs');
    }
}
