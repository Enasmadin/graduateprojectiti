<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->unsignedBigInteger('comment_id');
            // $table->foreign('comment_id')
            //     ->references('id')
            //     ->on('comments')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')
            //     ->references('id')
            //     ->on('posts')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')
            //     ->references('id')
            //     ->on('products')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
