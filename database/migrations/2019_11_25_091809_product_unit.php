<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {

           Schema::create('product_unit', function (Blueprint $table) {
               $table->increments('id');
               $table->string('name', 25);
               $table->string('notes')->nullable();
               $table->unsignedInteger('created_by');
               $table->unsignedInteger('updated_by');
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
          Schema::dropIfExists('product_unit');
      }
}
