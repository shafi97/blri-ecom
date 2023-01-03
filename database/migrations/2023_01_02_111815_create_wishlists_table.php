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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('user_uuid')->index();
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->string('product_uuid')->index();
            $table->foreign('product_uuid')->references('uuid')->on('products')->onDelete('cascade');
            // $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('wishlists');
    }
};
