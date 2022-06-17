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
//            $table->string('chat_id')->nullable();
            $table->integer('send_from')->default(0);
            $table->integer('send_to')->default(0);
            $table->integer('trainer_id')->default(0);
            $table->integer('trainee_id')->default(0);
            $table->longText('message')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('seen')->default('0');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
        Schema::dropIfExists('messages');
    }
}
