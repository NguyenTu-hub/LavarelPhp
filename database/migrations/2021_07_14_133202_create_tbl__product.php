<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Product', function (Blueprint $table) {
            $table->Increments('Product_id');
            $table->integer('Catergory_id');
            $table->integer('Brand_id');
            $table->text('Product_desc');
            $table->text('Product_content');
            $table->string('Product_price');
            $table->string('Product_image');
            $table->integer('Product_status');
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
        Schema::dropIfExists('tbl_Product');
    }
}
