<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $client = DB::table('clients')->count('id');
        $client = DB::table('clients')->select(DB::raw('count(id) as id_client'))->get();
        $service = DB::table('services')->select(DB::raw('count(id) as id_service'))->get();
        $wash = DB::table('washes')->join('services', 'washes.id_service', '=', 'services.id')
                                   ->select(DB::raw('sum(services.price) as price'))
                                   ->where('washes.created_at', '>', DB::raw('(NOW() - INTERVAL 30 DAY)'))
                                   ->get();
        $washYear = DB::table('washes')->join('services', 'washes.id_service', '=', 'services.id')
                                       ->select(DB::raw('sum(services.price) as price'))
                                       ->where('washes.created_at', '>', DB::raw('(NOW() - INTERVAL 1 YEAR)'))
                                       ->get();
        return view('home', compact('client', 'service', 'wash', 'washYear'));
    }
}
