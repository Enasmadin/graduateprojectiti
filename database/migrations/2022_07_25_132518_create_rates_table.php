<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->integer('rate_value_vendor')->nullable();
            $table->integer('rate_value_delivery')->nullable();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign("vendor_id")
                ->references("id")
                ->on("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign("delivery_id")
                ->references("id")
                ->on("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('rates');
    }
}
