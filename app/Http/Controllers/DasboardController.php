<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

use Auth;
use Input;
use Redirect;
use Storage;
use File;

use Illuminate\Http\Request;

class DasboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

 public $bidang;

	 public function __construct()
    {
			//blockio init
			   // $this->middleware('auth');

			

    }



	public function index()
	{





			return view('home', ['title' => 'Welcome'], compact(''));



}

	 public function RedirectOut($id)
	 {
		 $link = Link::find($id);
		 	 return Redirect::to('http://'.$link->link);
	 }



}
