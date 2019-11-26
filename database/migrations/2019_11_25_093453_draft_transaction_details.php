<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DraftTransactionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
     {
     Schema::create('draft_transaction_details', function (Blueprint $table) {
         $table->increments('id');
         $table->char('id_draft_transaction');
         $table->char('id_product');
         $table->unsignedInteger('qty');
         $table->unsignedInteger('price');
         $table->unsignedInteger('disc');
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
     Schema::dropIfExists('draft_transaction_details');
 }
}
