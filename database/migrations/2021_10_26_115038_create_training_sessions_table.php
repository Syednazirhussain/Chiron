<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('trainee_id')->default(0);
            $table->integer('trainer_id')->default(0);
            $table->date('date')->useCurrent();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->enum('training_session', ['1 on 1', '2 on 1'])->default('1 on 1');
            $table->enum('trainingPreference',['myLocation', 'clientlocation'])->default('myLocation');
            //            $table->enum('location', ['myLocation', 'clientlocation'])->default('myLocation');
            $table->string('location')->nullable();
            $table->enum('status', ['decline','pending', 'confirmed', 'completed', 'cancelled','rescheduled'])->default('pending');
            $table->integer('cancelled_by')->nullable();
            $table->enum('reschedule', ['0', '1'])->default('0');
            $table->integer('payment_id')->nullable();
            $table->enum('payment_status',['Unpaid','Paid',"Refund"])->default('Unpaid');
            $table->float('payable_amount');
            $table->string('transfer_id',100)->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('activation_date')->nullable();
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
        Schema::dropIfExists('training_sessions');
    }
}
