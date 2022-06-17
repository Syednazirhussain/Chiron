<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('session_id')->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('adminFee', 10, 2)->default(0);
            $table->decimal('adminFeeTax', 10, 2)->default(0);
            $table->decimal('stripe_charges', 10, 2)->default(0);
            $table->enum('user_type', ['admin', 'trainer', 'trainee'])->default('trainee');
            $table->string('stripe_payment_response')->nullable();
            $table->string('stripe_customer_id')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->decimal('pro_rate_billing')->nullable();
            $table->text('receipt_url')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->enum('payment_status',['Unpaid','Paid',"Refund"])->default('Unpaid');
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
        Schema::dropIfExists('user_payments');
    }
}
