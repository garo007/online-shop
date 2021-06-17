<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();
            $table->BigInteger('outgoing_id')->unsigned();#uxarkox
            $table->BigInteger('incoming_id')->unsigned();#stacox
            $table->enum('status', ['active','inactive'])->default('active');
        //    $table->foreign('outgoing_id')->references('id')->on('users')->onDelete('cascade');
        //    $table->foreign('incoming_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
