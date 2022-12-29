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
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('user_uuid')->index();
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->string('product_uuid')->index();
            $table->foreign('product_uuid')->references('uuid')->on('products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->decimal('price',14,2);
            $table->decimal('discount',14,2)->default(0);
            $table->boolean('pay_method')->comment('1=cash on delivery, 2=bank');
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
        Schema::dropIfExists('sales');
    }
};
