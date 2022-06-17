<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsSetupCreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_setup_creads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->default('0');
            $table->string('user_type')->nullable();
            $table->string('stripe_key')->nullable();
            $table->string('stripe_account_no')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('ba')->nullable();

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
        Schema::dropIfExists('payments_setup_creads');
    }
}
