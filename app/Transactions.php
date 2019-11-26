<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $table='transactions';
  protected $fillable = [
     'invoice_no','date', 'customer_name','customer_phone','payment','total','notes','status','created_by','updated_by'];

     public function transactiondetails(){
       return $this->hasMany('App\TransactionDetails');
     }


}
