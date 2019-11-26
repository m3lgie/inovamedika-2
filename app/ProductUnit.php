<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
  protected $table='product_unit';
  protected $fillable = [
     'name','notes','created_by','updated_by'];


}
