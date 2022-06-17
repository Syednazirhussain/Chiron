<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 80)->nullable();
            $table->string('iso_code2')->nullable();
            $table->string('iso_code3', 2)->nullable();
            $table->string('num_code', 80)->nullable();
            $table->softDeletes();
//            $table->string('phonecode')->nullable();
//            $table->string('capital')->nullable();
//            $table->string('currency')->nullable();
//            $table->string('currency_symbol')->nullable();
//            $table->string('tld')->nullable();
//            $table->string('native')->nullable();
//            $table->string('region')->nullable();
//            $table->string('subregion')->nullable();
//            $table->text('timezones')->nullable();
//            $table->text('translations')->nullable();
//            $table->decimal('latitude', 10, 8)->nullable();
//            $table->decimal('longitude', 10, 8)->nullable();
//            $table->string('emoji')->nullable();
//            $table->string('emojiU')->nullable();
//            $table->string('flag')->nullable();
//            $table->string('wikiDataId')->nullable();
//            $table->timestamp('created_at')->useCurrent();
//            $table->timestamp('updated_at')->useCurrent();
//            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
