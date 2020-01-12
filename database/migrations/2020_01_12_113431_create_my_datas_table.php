<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_code')->nullable();
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->double('qty')->nullable();
            $table->double('price')->nullable();
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
        Schema::dropIfExists('my_datas');
    }
}
