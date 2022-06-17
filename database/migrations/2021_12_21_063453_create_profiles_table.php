<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->enum('user_type',['trainer','trainee'])->default('trainer');
            $table->longText('about')->nullable();
            $table->text('specialties')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();


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
        Schema::dropIfExists('profiles');
    }
}
