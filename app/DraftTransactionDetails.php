<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftTransactionDetails extends Model
{
  protected $table='draft_transaction_details';
  protected $fillable = ['id_draft_transaction','id_product', 'qty','price','payment','disc','created_by','updated_by'];


}
