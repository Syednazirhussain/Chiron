<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsSendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_send', function (Blueprint $table) {
            $table->id();
            $table->string('promotions_id')->nullable();
            $table->string('user_id')->nullable();
            $table->enum('status', ['Send', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('promotions_send');
    }
}


//php artisan infyom:scaffold Promotions_send --fromTable --tableName=promotions_send
