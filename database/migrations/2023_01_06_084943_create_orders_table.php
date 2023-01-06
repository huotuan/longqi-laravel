<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->default(2);
            $table->integer('user_id')->default(0);
            $table->string('order_sn')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('total')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('password')->nullable();
            $table->json('snapshot')->nullable();
            $table->text('options')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
