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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('user_uuid')->index();
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->string('category_uuid')->index();
            $table->foreign('category_uuid')->references('uuid')->on('categories')->onDelete('cascade');
            $table->string('sub_category_uuid')->nullable()->index();
            $table->foreign('sub_category_uuid')->references('uuid')->on('sub_categories')->onDelete('cascade');
            $table->string('tran_id',64);
            $table->tinyInteger('type')->comment('1=in stock, 2=sale');
            $table->string('name',255);
            $table->string('weight',32)->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('size',191)->nullable();
            $table->string('color',191)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price',14,2)->nullable();
            $table->decimal('discount',14,2)->default(0);
            $table->string('product_code',191)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
