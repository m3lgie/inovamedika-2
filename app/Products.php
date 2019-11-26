<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $table='products';
  protected $fillable = [
     'name','unit_id','price','notes','created_by','updated_by'];


}
