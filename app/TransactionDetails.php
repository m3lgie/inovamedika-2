<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
  protected $table='transaction_details';
  protected $fillable = ['id_transaction','id_product', 'qty','price','payment','disc','created_by','updated_by'];


}
