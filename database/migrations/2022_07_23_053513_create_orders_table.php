<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
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
            $table->unsignedBigInteger('post_id');
            $table->foreign("post_id")
                ->references("id")
                ->on("posts")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign("client_id")
                ->references("id")
                ->on("clients")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('comment_id');
            $table->foreign("comment_id")
                ->references("id")
                ->on("comments")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('status', ["in progress", "completed", "declined"])->default("in progress");
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
        Schema::dropIfExists('orders');
    }
}
