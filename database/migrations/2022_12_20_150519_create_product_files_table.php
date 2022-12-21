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
        Schema::create('product_files', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('product_uuid')->index();
            $table->foreign('product_uuid')->references('uuid')->on('products')->onDelete('cascade');
            $table->boolean('type')->comment('1=Image, 2=video file, 3=youtube');
            $table->string('file',191);
            $table->string('title',191)->nullable();
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
        Schema::dropIfExists('product_files');
    }
};
