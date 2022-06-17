<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('user_id')->default(0);
            $table->string('user_type', 255)->nullable();
            $table->string('source', 255)->nullable();
            $table->string('source_type', 255)->nullable();
            $table->string('document_type')->nullable();
            // $table->enum('document_type',['Training','CPR','ID','Utility'])->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }


//'personal_traing_certificate'
//'cpr_training_certificate'
//'govt_identification'
//'utility_bill'

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
