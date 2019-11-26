<?php namespace App\Http\Controllers;


use App\Products;
use App\ProductUnit;
use App\Listing;
use App\Konversi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Auth;
use Redirect;


use Illuminate\Http\Request;

class ProductsController extends Controller {

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
		$products = Products::all();


				return view('Products.index', ['title' => 'Data Products'],compact('products'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

  	$product_unit = ProductUnit::all();


				return view('Products.create', ['title' => 'Tambah Data Products'], compact('product_unit'));



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	$this->validate($request, $this->rules);



	$Products = new Products();

	$Products->name = Input::get('name');
	$Products->unit_id = Input::get('unit_id');
	$Products->price = Input::get('price');
	$Products->notes = Input::get('notes');
	$Products->created_by = Auth::id();
	$Products->updated_by = "0";
	$Products->save();


			  return Redirect::route('products.index')->with('alert-success', 'Data Berhasil Disimpan.');




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$products = Products::find($id);

							return view('Products.show', ['title' => 'Tampil Data Products'], compact('products'));



	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{



		$products = Products::find($id);
	  $product_unit = ProductUnit::all();
							return view('products.edit', ['title' => 'Update Data Products Table'], compact('products','product_unit'));


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$products = Products::find($id);
		$input = array_except(Input::all(), '_method');
		$input['updated_by']=Auth::id();
		$products->update($input);

					return Redirect::route('products.index')->with('alert-success', 'Data Berhasil Diupdate.');


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



					$products = DB::table('products')
						->where('id',$id);
					$products->delete();
					return Redirect::route('products.index')->with('alert-success', 'Data Berhasil Dihapus.');

	}
	else {
					return Redirect::route('products.index')->with('alert-success', 'Data Tidak Dapat Dihapus, Hanya Dapat Dilakukan Peupdaten Status.');
	}

	}

	public function search(Request $request)
	{
			if($request->ajax())
			{
				$output="";
				$products=DB::table('products')->where('name','LIKE','%'.$request->search."%")->get();
				if($products)
				{


			$output= view('transactions.form.search_result', ['title' => 'Update Data Products Table'], compact('products'));
				return Response($output);
				   }
			}
	}



}
