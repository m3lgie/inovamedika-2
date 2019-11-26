<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftTransactions extends Model
{
  protected $table='draft_transactions';
  protected $fillable = [
     'draft_key','date', 'customer_name','customer_phone','payment','total','notes','status','created_by','updated_by'];

     public function drafttransactiondetails(){
       return $this->hasMany('App\DraftTransactionDetails');
     }




}
