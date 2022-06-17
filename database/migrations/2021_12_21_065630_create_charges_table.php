<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->integer('location')->nullable();
            $table->enum('user_type', ['for_trainer', 'for_admin'])->nullable();
            $table->float('one_on_1_training_charge', 8, 2)->nullable();
            $table->float('one_on_1_training_charge_sales_tax', 8, 2)->nullable();
            $table->float('two_on_1_training_charge', 8, 2)->nullable();
            $table->float('two_on_1_training_charge_sales_tax', 8, 2)->nullable();
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
        Schema::dropIfExists('charges');
    }
}
