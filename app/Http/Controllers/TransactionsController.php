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

class TransactionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'index','create', 'store', 'edit', 'destroy'
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
		$transactions = DB::table('transactions')
                ->orderBy('id', 'desc')
                ->get();


				return view('Transactions.index', ['title' => 'Data Transactions'],compact('transactions'));


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
	public function store(Request $request)
	{
	$this->validate($request, $this->rules);


$draft_transactions_key=session('draft_transactions');

	$draft_transactions = new DraftTransactions();

	if(Input::get('payment')<Input::get('total')){
	 $status=0;
	}
	else{
	 $status=1;
	}

	$draft_transactions->draft_key = $draft_transactions_key;
	$draft_transactions->date = date('Y-m-d H:i:s');
	$draft_transactions->customer_name = Input::get('customer_name');
	$draft_transactions->customer_phone= Input::get('customer_phone');
	$draft_transactions->total= Input::get('total');
	$draft_transactions->payment= Input::get('payment');
	$draft_transactions->notes= Input::get('notes');
	$draft_transactions->status= $status;
	$draft_transactions->created_by = Auth::id();
	$draft_transactions->updated_by = "0";
	$draft_transactions->save();


			  return Redirect::route('draft_transactions.show', array($draft_transactions_key))->with('alert-success', 'Data Berhasil Diproses.');




	}

	public function save($id)
	{

  $draft_transactions_key=session('draft_transactions');

	$draft_transactions = DataTransactions::getDraftTransactions($id);



	$draft_transaction_details =  DataTransactions::getDraftTransactionDetails($id);


	if($draft_transactions[0]->payment<$draft_transactions[0]->total){
	 $status=0;
	}
	else{
	 $status=1;
	}

	$transactions = new Transactions();

	$transactions->invoice_no = DataTransactions::getNoInvoice();;
	$transactions->date = $draft_transactions[0]->date;
	$transactions->customer_name =  $draft_transactions[0]->customer_name;
	$transactions->customer_phone=  $draft_transactions[0]->customer_phone;
	$transactions->total=  $draft_transactions[0]->total;
	$transactions->payment=  $draft_transactions[0]->payment;
	$transactions->notes=  $draft_transactions[0]->notes;
	$transactions->status= $status;
	$transactions->created_by = Auth::id();
	$transactions->updated_by = "0";
	$transactions->save();

	$data_last_transcation=Transactions ::all()->last();

	foreach ($draft_transaction_details as $key => $detail) {
		$transaction_details = new TransactionDetails();

		$transaction_details->id_transaction = $data_last_transcation->id;
		$transaction_details->id_product =$detail->id_product;
		$transaction_details->qty = $detail->qty;
		$transaction_details->price = $detail->price;
		$transaction_details->disc =  $detail->disc;;
		$transaction_details->created_by = Auth::id();
		$transaction_details->updated_by = "0";
		$transaction_details->save();

	}

	DataTransactions::ClearDraftTransactions($draft_transactions[0]->id,$draft_transactions[0]->draft_key);




				return Redirect::route('transactions.show', array($data_last_transcation))->with('alert-success', 'Data Berhasil Diproses.');




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transactions = Transactions::find($id);

		$transaction_details = DataTransactions::getTransactionDetails($id);


							return view('transactions.show', ['title' => 'Tampil Data Transactions'], compact('transactions','transaction_details'));



	}

	public function print($id)
	{
		$transactions = Transactions::find($id);

		$transaction_details = DataTransactions::getTransactionDetails($id);


							return view('transactions.print', ['title' => 'Tampil Data Transactions'], compact('transactions','transaction_details'));



	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{

		$transactions = Transactions::find($id);

		$transaction_details = DataTransactions::getTransactionDetails($id);



		return view('transactions.edit', ['title' => 'Update Data Transactions Table'], compact('transactions','transaction_details'));


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$total=Input::get('total');
		$payment=Input::get('payment');
		$pembatalan=Input::get('pembatalan');


		if($pembatalan==0 ){
			if($total<=$payment){
					$status=1;
			}
			else {
					$status=0;
			}
		}
		else {
				$status=3;
		}




		$transactions = Transactions::find($id);
		$input = array_except(Input::all(), '_method');
		$input['payment']=$payment;
		$input['status']=$status;
		$input['updated_by']=Auth::id();
		$transactions->update($input);

					return Redirect::route('transactions.index')->with('alert-success', 'Data Berhasil Diupdate.');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
