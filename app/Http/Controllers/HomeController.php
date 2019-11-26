<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Konversi;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $order              = 'DESC';
          $endDate            = Carbon::today();
          $startDate          = Carbon::today()->subWeek();





        	return view('layouts/app', ['title' => 'Welcome'],compact('notifPosting','notifFile','posts'));
    }
}
