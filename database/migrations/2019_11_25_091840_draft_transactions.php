<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DraftTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('draft_transactions', function (Blueprint $table) {
             $table->increments('id');
             $table->string('draft_key');
             $table->DateTime('date');
             $table->string('customer_name');
             $table->string('customer_phone');
             $table->unsignedInteger('payment');
             $table->unsignedInteger('total');
             $table->string('notes')->nullable();
             $table->unsignedInteger('status');
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
         Schema::dropIfExists('transaction_detil');
     }
}
