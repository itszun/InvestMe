<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Investor;
use InvestMe\Entrepreneur;

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
    public function index(Request $request)
    {
        $lvl = auth()->user()->level;
        if($lvl == 2){
            $x = new Entrepreneur;
        }else if($lvl == 1){
            $x = new Investor;
        }
        $l = $x->all();
        return view('home', ['x' => $l]);
    }
}
