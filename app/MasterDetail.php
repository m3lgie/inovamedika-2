<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDetail extends Model
{
  protected $table='tb_detil_master';
  protected $fillable = [
     'nama', 'satuan','keterangan','tipe_value','operation','graph','id_master','created_by','updated_by'];
}
