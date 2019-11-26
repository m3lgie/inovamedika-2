<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
  protected $table='tb_master';
  protected $fillable = [
     'nama','id_bidang', 'keterangan','sumber','tipe','akses','inputan','tipe_inputan','id_list','status','created_by','updated_by'];

     public function masterdetail(){
       return $this->hasMany('App\MasterDetail');
     }
}
