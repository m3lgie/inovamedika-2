<?php namespace App\Http\Controllers;


use App\Transactions;
use App\TransactionDetails;
use App\DraftTransactions;
use App\DrafTransactionsDetail;
use App\ProductUnit;
use App\Konversi;
use App\DataTransactions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Session;
use DB;
use Input;
use Auth;
use Redirect;


use Illuminate\Http\Request;

class ReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'index','create', 'store', 'edit', 'destroy','find'
        ]]);
    }

	protected $rules = [

		'customer_name' => ['required'],
		'customer_phone' => ['required'],
		'payment' => ['required'],
		'notes' => ['required'],

	];

	public function index()
	{



				return view('report.index', ['title' => 'Data Transactions'],compact(''));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


		if(!session()->exists('draft_transactions')){
			session(['draft_transactions' => Str::random(8)]);
		}

		$draft_transactions_key=session('draft_transactions');



		$draft_transactions_details = DataTransactions::getDraftTransactionDetailsByDraftKey($draft_transactions_key);




				return view('Transactions.create', ['title' => 'Tambah Data Transactions'], compact('draft_transactions_details'));



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function find(Request $request)
	{

		$start=Input::get('start');
		$end=Input::get('end');


								$transactions = DB::table('transaction_details')
									->join('transactions', function ($join) {
											$join->on('transaction_details.id_transaction', '=', 'transactions.id');
									})
									->join('products', function ($join) {
											$join->on('transaction_details.id_product', '=', 'products.id');
									})->where([
						        ['transactions.date', '>', $start],
						        ['transactions.date', '<', $end] ])
									->select('transaction_details.*','transactions.*',DB::raw('transactions.id as id_transactions'),DB::raw('transaction_details.id as id_transaction_details'),DB::raw('products.name as name'))
									->orderBy('id_transactions','asc')
									->get();



			return view('report.print', ['title' => 'Data Transactions'],compact('transactions','start','end'));




	}

	public function destroy($id)
	{

	if(Auth::user()->level == '0') {

					$transactions = Transactions::find($id);
					$transactions->delete();
					return Redirect::route('transactions.index')->with('alert-success', 'Data Berhasil Dihapus.');

	}
	else {
					return Redirect::route('transactions.index')->with('alert-success', 'Data Tidak Dapat Dihapus, Hanya Dapat Dilakukan Peupdaten Status.');
	}

	}

}
