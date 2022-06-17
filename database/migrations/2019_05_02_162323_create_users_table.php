<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name', 255)->nullable();
            $table->string('municipality', 255)->nullable();
            $table->tinyInteger('is_confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->text('profile_image')->nullable();
            $table->text('cover_image')->nullable();
            $table->enum('status',['pending','approved','cancelled','deactivate'])->default('pending');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->date('dob')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('experience')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->string('customer_stripe_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('stripe_card_id')->nullable();
            $table->integer('last_four_card_digits')->default(0);
            $table->string('exp_month')->nullable();
            $table->string('exp_year')->nullable();
            $table->string('card_name')->nullable();
            $table->string('c_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('stripe_account_id',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
