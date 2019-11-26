<?php

namespace App;
use App\ListDetail;
use App\Tahun;
use App\Kabupaten;
use Illuminate\Support\Facades\DB;

class Konversi
{
  public static function rupiah($nilai){
      $value="Rp. ".number_format($nilai, 2, ',', '.');


    return $value;
  }


  public static function level($nilai){
      $value="";
    if ($nilai=="0"){
        $value="Super Admin";
    }
    else if ($nilai=="1"){
        $value="Administrator";
    }
    else if ($nilai=="2"){
        $value="Kasir";
    }

    else {
        $value="Staff";
    }

    return $value;
  }


  public static function unit($nilai){


    $value="";
    if ($unit= ProductUnit::find($nilai)){
        $value=$unit->name;
    }
    else {
      $value="-";
    }


    return $value;
  }


  public static function Inputan($nilai){
      $value="";
    if ($nilai=="0"){
        $value="Single";
    }

    else {
        $value="Multiple";
    }

    return $value;
  }

  public static function tipe_inputan($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Input Manual";
    }
    else{
        $value="From List";
    }
      return $value;
  }

  public static function tipe_value($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Number";
    }
    else{
        $value="Text";
    }
      return $value;
  }

  public static function operation($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Sum";
    }
    else if ($nilai=="1"){
        $value="Count";
    }
    else{
        $value="Non";
    }
      return $value;
  }

  public static function publish($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Internal";
    }
    else if ($nilai=="1"){
        $value="External";
    }
    else{
        $value="Public";
    }
      return $value;
  }

  public static function akses($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Internal";
    }
    else{
        $value="External";
    }

      return $value;
  }

  public static function grafik($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Tampil";
    }
    else{
        $value="Tidak";
    }

      return $value;
  }

  public static function status($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Belum Lunas";
    }
    else if ($nilai=="1"){
        $value="Lunas";
    }
    else {
      $value="Batal";
    }
  return $value;

}
    public static function status_user($nilai){
      $value="";
      if ($nilai=="1"){
          $value="Tidak Aktif";
      }

      else {
        $value="Aktif";
      }


    return $value;
  }

  public static function listmaster($nilai){


    $value="";
    if ($list= Listing::find($nilai)){
        $value=$list->nama;
    }
    else {
      $value="";;
    }


    return $value;
  }

  public static function listing($nilai){


    $value="";
    if ($list= ListDetail::find($nilai)){
        $value=$list->nama;
    }
    else {
      $value="";;
    }


    return $value;
  }

  public static function user($nilai){


    $value="";
    if ($user= User::find($nilai)){
        $value=$user->name;
    }
    else {
      $value="";;
    }


    return $value;
  }

  public static function tahun($nilai){


    $value="";
    if ($tahun= Tahun::find($nilai)){
        $value=$tahun->tahun;
    }
    else {
      $value="-";
    }


    return $value;
  }


    public static function kabupaten($nilai){


      $value="";
      if ($kabupaten= Kabupaten::find($nilai)){
          $value=$kabupaten->kabupaten;
      }
      else {
        $value="-";
      }


      return $value;
    }

  public static function idtahun($nilai){
    $tahun = DB::table('tb_tahun')
      ->where('tb_tahun.tahun', '=', $nilai)
      ->select('tb_tahun.*')
      ->orderBy('id','asc')
      ->get();


    $value="";
    foreach ($tahun as $key => $tahun) {
      $value=$tahun->id;
    }


    return $value;
  }

  public static function tipe_view($nilai){
    $value="";
    if ($nilai=="0"){
        $value="Tahun Laporan";
    }
    else {
      $value="5 Tahunan";;
    }
    return $value;
  }

    public static function dasboard($nilai){
      $value="";
      if ($nilai=="0"){
          $value="Ya";
      }
      else {
        $value="Tidak";
      }
      return $value;
    }


    public static function kontribusi_status($nilai){
      $value="";
      if ($nilai>0.5){
          $value="<span class='label bg-blue'>Aktif</span>";
      }
      elseif ($nilai<0.5 and $nilai>0.3){
          $value="<span class='label bg-green'>Sedang</span>";
      }
      else {
          $value="<span class='label bg-red'>Tidak Aktif</span>";
      }
      return $value;
    }






}
