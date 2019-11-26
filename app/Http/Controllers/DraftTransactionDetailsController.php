<?php namespace App\Http\Controllers;


use App\Transactions;
use App\DraftTransactionDetails;
use App\DataTransactions;
use App\ProductUnit;
use App\Products;
use App\Konversi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;
use Input;
use Auth;
use Redirect;


use Illuminate\Http\Request;

class DraftTransactionDetailsController extends Controller {

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
		$transactions = Transactions::find($id);

							return view('Transactions.show', ['title' => 'Tampil Data Transactions'], compact('transactions'));



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


	public function update_item(Request $request)
	{

		$item_id = Input::get('id');
		$qty = Input::get('qty');
		$disc = Input::get('disc');

	foreach($item_id as $key => $n )
	{
	 $arrData[] = array(

	        "qty"			=> $qty[$key],
	        "disc"		=> $disc[$key]

	    );

			DraftTransactionDetails::where('id', '=', $item_id[$key])
    	->update(['qty'=>$qty[$key],'disc'=> $disc[$key]]);


		}

		$draft_transactions_key=session('draft_transactions');

		$draft_transactions_details = DataTransactions::getDraftTransactionDetailsOnly($draft_transactions_key);


				return view('Transactions.create', ['title' => 'Tambah Data Transactions'], compact('checkProduct','draft_transactions_key','draft_transactions_details'))->with('alert-success', 'Item Berhasil Dihapus');



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
