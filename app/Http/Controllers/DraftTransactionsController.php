<?php namespace App\Http\Controllers;


use App\Transactions;
use App\DraftTransactionDetails;
use App\ProductUnit;
use App\Products;
use App\Konversi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\DataTransactions;
use DB;
use Input;
use Auth;
use Redirect;


use Illuminate\Http\Request;

class DraftTransactionsController extends Controller {

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

		'name' => ['required'],
		'unit_id' => ['required'],
		'price' => ['required'],
		'notes' => ['required'],

	];

	public function index()
	{
		$transactions = Transactions::all();


				return view('Transactions.index', ['title' => 'Data Transactions'],compact('transactions'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		session(['draft_transactions' => Str::random(40)]);

		$draft_transactions_key=session('draft_transactions');
  	$product_unit = ProductUnit::all();


				return view('Transactions.create', ['title' => 'Tambah Data Transactions'], compact('product_unit','draft_transactions_key'));



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	$this->validate($request, $this->rules);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$draft_transactions = DataTransactions::getDraftTransactionsByDraftKey($id);

		$draft_transaction_details = DataTransactions::getDraftTransactionDetailsByDraftKey($id);

	return view('drafttransactions.create', ['title' => 'Tampil Data Transactions'], compact('draft_transactions','draft_transaction_details'));



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
	  $product_unit = ProductUnit::all();
							return view('transactions.edit', ['title' => 'Update Data Transactions Table'], compact('transactions','product_unit'));


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$transactions = Transactions::find($id);
		$input = array_except(Input::all(), '_method');
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



	}



	public function add_item(Request $request)
	{



				$id_product=$request->id_product;
				$draft_transactions_key=session('draft_transactions');

				$checkProduct=DataTransactions::getProductDraftTransactionDetails($id_product,$draft_transactions_key);


				$products= Products::find($request->id_product);
				if($products and $checkProduct==0)
				{

					$draft_transactions = new DraftTransactionDetails();

					$draft_transactions->id_draft_transaction = $draft_transactions_key;
					$draft_transactions->id_product =$products->id;
					$draft_transactions->qty = $request->qty;
					$draft_transactions->price = $products->price;
					$draft_transactions->disc = 0;
					$draft_transactions->created_by = Auth::id();
					$draft_transactions->updated_by = "0";
					$draft_transactions->save();

					$alert="Product Telah Ditambahkan";
				}
				else {
					$alert="Product Berhasil Ditambahkan";
				}



				$draft_transactions_details = DataTransactions::getDraftTransactionDetailsOnly($draft_transactions_key);


				return view('Transactions.create', ['title' => 'Tambah Data Transactions'], compact('checkProduct','draft_transactions_key','draft_transactions_details'))->with('alert-success', $alert);
	}

	public function delete_item($id)
	{
		$draft_transactions_key=session('draft_transactions');

		DataTransactions::getProductDraftTransaction($id,$draft_transactions_key)->delete();


	  $draft_transactions_details = DataTransactions::getDraftTransactionDetailsOnly($draft_transactions_key);


				return view('Transactions.create', ['title' => 'Tambah Data Transactions'], compact('checkProduct','draft_transactions_key','draft_transactions_details'))->with('alert-success', 'Item Berhasil Dihapus');
	}


}
