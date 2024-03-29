<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('products', function (Blueprint $table) {
              $table->increments('id');
              $table->string('name', 25);
              $table->unsignedInteger('unit_id');
              $table->unsignedInteger('price');
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
         Schema::dropIfExists('products');
     }
}
