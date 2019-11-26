<?php namespace App\Http\Controllers;


use App\ProductUnit;
use App\Konversi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use Redirect;
use DB;


use Illuminate\Http\Request;

class ProductUnitController extends Controller {

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
		'notes' => ['required'],


	];

	public function index()
	{
		$product_unit = ProductUnit::all();


				return view('product_unit.index', ['title' => 'Data ProductUnit'],compact('product_unit'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

    $product_unit = ProductUnit::all();

				return view('product_unit.create', ['title' => 'Tambah Data ProductUnit'], compact('product_unit'));



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	$this->validate($request, $this->rules);
	$input = Input::all();
	$input['created_by']=Auth::id();
	$input['updated_by']="0";
	ProductUnit::create( $input );


			  return Redirect::route('product_unit.index')->with('alert-success', 'Data Berhasil Disimpan.');




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product_unit = ProductUnit::find($id);

		return view('product_unit.show', ['title' => 'Tampil Data Product Unit'], compact('product_unit'));



	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{



		$product_unit= ProductUnit::find($id);

							return view('product_unit.edit', ['title' => 'Update Data Product Unit'], compact('product_unit'));


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product_unit= ProductUnit::find($id);
		$input = array_except(Input::all(), '_method');
		$input['updated_by']=Auth::id();
		$product_unit->update($input);

					return Redirect::route('product_unit.index')->with('alert-success', 'Data Berhasil Diupdate.');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$products = DB::table('product_unit')
			->where('id',$id);
		$products->delete();

	if(Auth::user()->level == '0') {
					return Redirect::route('product_unit.index')->with('alert-success', 'Data Berhasil Dihapus.');
	}

	}

}
