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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('assign_to')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->integer('phone');
            $table->longText('message')->nullable();
            $table->string('address');
            $table->string('state');
            $table->string('zip_code');
            $table->date('job_date');
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('livingroom')->nullable();
            $table->tinyInteger('furnished')->nullable();
            $table->string('house_type')->nullable();
            $table->string('blinds')->nullable();
            $table->string('howlong')->nullable();
            $table->tinyInteger('carpet')->nullable();
            $table->tinyInteger('pest')->nullable();
            $table->tinyInteger('call')->nullable();
            $table->tinyInteger('sms')->nullable();
            $table->tinyInteger('send_email')->nullable();
            $table->tinyInteger('email_status')->nullable();
            $table->tinyInteger('status')->default(0)->comment("0 = pending, 1 = processing, 2 = completed");
            $table->tinyInteger('deleted')->default(0);
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
};
