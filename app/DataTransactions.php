<?php

namespace App;
use App\Transactions;
use Session;

use Illuminate\Support\Facades\DB;

class DataTransactions
{
  public static function getsubtotal($nilai){
      $value="";


    return $value;
  }

  public static function getNoInvoice(){

      $today=date('Ymd');
      $data_last_transcation=Transactions ::all()->last();

      $lastNoTransaksi = $data_last_transcation->invoice_no;

      // baca nomor urut transaksi dari id transaksi terakhir
      $lastNoUrut = substr($lastNoTransaksi, 9, 4);

      // nomor urut ditambah 1
      $nextNoUrut = $lastNoUrut + 1;

      // membuat format nomor transaksi berikutnya
      $nextNoTransaksi = "P".$today.sprintf('%04s', $nextNoUrut);

    return $nextNoTransaksi;
  }

  public static function getTransaction($id){

    $transaction_details = DB::table('transaction_details')
      ->join('transactions', function ($join) {
          $join->on('transaction_details.id_transaction', '=', 'transactions.id');
      })
      ->join('products', function ($join) {
          $join->on('transaction_details.id_product', '=', 'products.id');
      })->where('transactions.id', '=', $id)
      ->select('transaction_details.*',DB::raw('transaction_details.id as id_transactions'),DB::raw('products.name as name'))
      ->orderBy('id','asc')
      ->get();


    return $transaction_details;
  }

  public static function getTransactionDetails($id){

    $draft_transactions = DB::table('transaction_details')
			->join('transactions', function ($join) {
					$join->on('transaction_details.id_transaction', '=', 'transactions.id');
			})
			->join('products', function ($join) {
					$join->on('transaction_details.id_product', '=', 'products.id');
			})->where('transactions.id', '=', $id)
			->select('transaction_details.*',DB::raw('transaction_details.id as id_transactions'),DB::raw('products.name as name'))
			->orderBy('id','asc')
			->get();


    return $draft_transactions;
  }


  public static function getDraftTransactions($id){

    $draft_transactions = DB::table('draft_transactions')
  		->join('draft_transaction_details', function ($join) {
  				$join->on('draft_transaction_details.id_draft_transaction', '=', 'draft_transactions.draft_key');
  		})->where('draft_transactions.id', '=', $id)
  		->select('draft_transactions.*', DB::raw('draft_transaction_details.id as id_draft_transaction'))
  		->orderBy('id','asc')
  		->get();


    return $draft_transactions;
  }

  public static function getDraftTransactionDetails($id){

    $draft_transaction_details = DB::table('draft_transaction_details')
      ->join('draft_transactions', function ($join) {
          $join->on('draft_transaction_details.id_draft_transaction', '=', 'draft_transactions.draft_key');
      })
      ->join('products', function ($join) {
          $join->on('draft_transaction_details.id_product', '=', 'products.id');
      })->where('draft_transactions.id', '=', $id)
      ->select('draft_transaction_details.*',DB::raw('draft_transactions.id as id_draft_transactions'),DB::raw('products.name as name'))
      ->orderBy('id','asc')
      ->get();
    return $draft_transaction_details;
  }





    public static function getDraftTransactionsByDraftKey($id){

      $draft_transactions = DB::table('draft_transactions')
  			->join('draft_transaction_details', function ($join) {
  					$join->on('draft_transaction_details.id_draft_transaction', '=', 'draft_transactions.draft_key');
  			})->where('draft_transactions.draft_key', '=', $id)
  			->select('draft_transactions.*', DB::raw('draft_transaction_details.id as id_draft_transaction'))
  			->orderBy('id','asc')
  			->get();

      return $draft_transactions;
    }

    public static function getDraftTransactionDetailsByDraftKey($id){

      $draft_transaction_details = DB::table('draft_transaction_details')

        ->join('products', function ($join) {
            $join->on('draft_transaction_details.id_product', '=', 'products.id');
        })->where('draft_transaction_details.id_draft_transaction', '=', $id)
        ->select('draft_transaction_details.*',DB::raw('products.name as name'))
        ->orderBy('id','asc')
        ->get();
      return $draft_transaction_details;
    }


    public static function getDraftTransactionDetailsOnly($id){

      $draft_transaction_details = DB::table('draft_transaction_details')
        ->join('products', function ($join) {
            $join->on('draft_transaction_details.id_product', '=', 'products.id');
        })->where('draft_transaction_details.id_draft_transaction', '=', $id)
        ->select('draft_transaction_details.*', DB::raw('products.id as id_product'), DB::raw('products.name as name'))
        ->orderBy('id','asc')
        ->get();
      return $draft_transaction_details;
    }
    public static function getProductDraftTransactionDetails($id,$draf_key){

      $draft_transaction_details = DB::table('draft_transaction_details')
        ->where([
        ['draft_transaction_details.id_draft_transaction', '=', $draf_key],
        ['draft_transaction_details.id_product', '=', $id] ])
        ->get()->count();
      return $draft_transaction_details;
    }


    public static function ClearDraftTransactions($id,$draf_key){

      DB::table('draft_transaction_details')
    	->where('id_draft_transaction',$draf_key)
    	->delete();

      DB::table('draft_transactions')
    	->where('id',$id)
    	->delete();

      Session::pull('draft_transactions');
    }


    public static function getProductDraftTransaction($id,$draf_key){

      $draft_transactions_product= DB::table('draft_transaction_details')
        ->where([
        ['draft_transaction_details.id_draft_transaction', '=', $draf_key],
        ['draft_transaction_details.id_product', '=', $id] ])
        ;

      return $draft_transactions_product;
    }





}
