<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->default('0');
            $table->text('profile_pic', 255)->nullable();
            $table->longText('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->enum('location',['clientlocation','myLocation','clientlocation,myLocation','myLocation,clientlocation'])->default('myLocation');
            $table->enum('training_session',['1 on 1','2 on 1','1 on 1,2 on 1','2 on 1,1 on 1'])->default('1 on 1');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('address');
    }
}
