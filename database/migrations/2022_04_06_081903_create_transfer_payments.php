<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_id')->nullable();
            $table->integer('transferred_to')->nullable();
            $table->integer('transferred_by')->nullable();
            $table->integer('session_id')->nullable();
            $table->float('amount')->nullable();
            $table->char('currency', 5)->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('destination')->nullable();
            $table->string('destination_payment')->nullable();
            $table->string('source_type')->nullable();
            $table->string('transfer_group')->nullable();
            $table->string('transfer_date')->nullable();
            $table->enum('status',['pending','completed'])->default('pending');
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
        Schema::dropIfExists('transfer_payments');
    }
}
