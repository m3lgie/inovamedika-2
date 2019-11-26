<?php namespace App\Http\Controllers;


use App\Users;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input;
use Auth;
use Redirect;


use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'index','create', 'store', 'show', 'edit', 'destroy'
        ]]);
    }

	protected $rules = [

		'name' => ['required'],
		'username' => ['required'],['max:255'],
		'email' => ['required'],['email'],['max:255'],['unique:users'],
		'password' => ['required'],['max:6'],['confirmed'],
		'level' => ['required'],
		'id_opd' => ['required'],
		'id_kabupaten' => ['required'],
		'status' => ['required'],


	];

	public function index()
	{

		$users = DB::table('users')

			->select('users.*')
			->orderBy('id','asc')
			->get();
			if(Auth::user()->level == '0') {
			return view('users.index', ['title' => 'Data Users'],compact('users'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{



		if(Auth::user()->level == '0') {
			 return view('users.create', ['title' => 'Tambah Data Users'], compact('users'));
		}


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$supported_image = array(
    'gif',
    'jpg',
    'jpeg',
    'png'
		);
	$this->validate($request, $this->rules);
	$input = Input::all();
	$input['password']=bcrypt(Input::get('password'));
	$input['created_by']=Auth::id();
	$input['updated_by']="0";


	if(Auth::user()->level == '0') {

			$gambar = array('gambar' => Input::file('gambar'));

		 if (Input::hasFile('gambar')) {
			 $destinationPath = 'user/images/'; // upload path
			 $extension = Input::file('gambar')->getClientOriginalExtension(); // getting image extension
			 $fileName = $input['username'].rand(11111,99999).'.'.$extension; // renaming image
			 Input::file('gambar')->move($destinationPath, $fileName); // uploading file to given path
		 	 $input['gambar'] =$destinationPath. '/'.$fileName;
			 if (in_array($extension, $supported_image)) {
						 if(Users::create( $input ))
						 {
							 $warning="Data Berhasil Disimpan";
						 }
						 else {
							 $warning="Data Gagal Disimpan";
						 }
					 } else {
    					 $warning="Data Gagal Disimpan, Format Gambar Tidak Valid";
						}


		 } else {
			 $input['gambar']="0";
			 if(Users::create( $input ))
			 {

				 $warning="Data Berhasil Disimpan Tampa Gambar";
			 }
			 else {
				 $warning="Data Gagal Disimpan";
			 }
			}
	 }
	 else {
		  $warning="Data Gagal Disimpan";
	 }

	 return Redirect::route('users.index')->with('alert-success', $warning);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = Users::find($id);


		if(Auth::user()->level == '0' or Auth::user()->id == $id ) {
				 	return view('users.show', ['title' => 'Tampil Data Users'], compact('users'));
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{


		$users = Users::find($id);

		if(Auth::user()->level == '0') {
					return view('users.edit', ['title' => 'Update Data Users'], compact('users'));
		}


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$supported_image = array(
		'gif',
		'jpg',
		'jpeg',
		'png'
		);

		$users = Users::find($id);
		$input = array_except(Input::all(), '_method');
		$input['updated_by']=Auth::id();
		$input['password']=bcrypt(Input::get('password'));






		if(Auth::user()->level == '0') {

				$gambar = array('gambar' => Input::file('gambar'));

			 if (Input::hasFile('gambar')) {
				 $destinationPath = 'user/images/'; // upload path
				 $extension = Input::file('gambar')->getClientOriginalExtension(); // getting image extension
				 $fileName = $input['username'].rand(11111,99999).'.'.$extension; // renaming image
				 Input::file('gambar')->move($destinationPath, $fileName); // uploading file to given path
			 	 $input['gambar'] =$destinationPath. '/'.$fileName;
				 if (in_array($extension, $supported_image)) {
							 if($users->update($input))
							 {
								 $warning="Data Berhasil Diupdate";
							 }
							 else {
								 $warning="Data Gagal Diupdate";
							 }
						 } else {
	    					 $warning="Data Gagal Diupdate, Format Gambar Tidak Valid";
							}


			 } else {
				 if($users->update($input))
				 {
					 $warning="Data Berhasil Diupdate Tampa Gambar";
				 }
				 else {
					 $warning="Data Gagal Diupdate";
				 }

				}
		 }
		 else {
			  $warning="Data Gagal Diupdate";
		 }

		 return Redirect::route('users.index')->with('alert-success', $warning);


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	$users = Users::find($id);
	$users->delete();




			if(Auth::user()->level == '0') {
				return Redirect::route('users.index')->with('alert-success', 'Data Berhasil Dihapus.');
			}

	}

	public function showdetail($id)
	{

		if(Auth::user()->id == $id) {
		$users = Users::find($id);



		return view('users.edit', ['title' => 'Update Data Users'], compact('users'));
		}
		else {
			return view('layouts/404', ['title' => 'Page Not Found']);
		}


	}

	public function update_profile($id)
	{
		$supported_image = array(
		'gif',
		'jpg',
		'jpeg',
		'png'
		);

		$users = Users::find($id);
		$input = array_except(Input::all(), '_method');
		$input['updated_by']=Auth::id();
		$input['password']=bcrypt(Input::get('password'));

				$gambar = array('gambar' => Input::file('gambar'));

			 if (Input::hasFile('gambar')) {
				 $destinationPath = 'user/images/'; // upload path
				 $extension = Input::file('gambar')->getClientOriginalExtension(); // getting image extension
				 $fileName = $input['username'].rand(11111,99999).'.'.$extension; // renaming image
				 Input::file('gambar')->move($destinationPath, $fileName); // uploading file to given path
			 	 $input['gambar'] =$destinationPath. '/'.$fileName;
				 if (in_array($extension, $supported_image)) {
							 if($users->update($input))
							 {
								 $warning="Data Berhasil Diupdate";
							 }
							 else {
								 $warning="Data Gagal Diupdate";
							 }
						 } else {
	    					 $warning="Data Gagal Diupdate, Format Gambar Tidak Valid";
							}


			 } else {
				 if($users->update($input))
				 {
					 $warning="Data Berhasil Diupdate Tampa Gambar";
				 }
				 else {
					 $warning="Data Gagal Diupdate";
				 }

				}


		 return Redirect::route('index')->with('alert-success', $warning);


	}



}
