<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InvestMe\Entrepreneur;
use Carbon\Carbon;

class EntrepreneurController extends Controller
{
    public function __construct() {
        // $this->middleware('level:admin')->only(['index','show','destroy','edit']);
        // $this->middleware('level:entrepreneur')->only(['create','store','edit','show','update']);
        // $this->middleware('level:investor')->only(['create','store','edit','show','update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrepreneurs = Entrepreneur::all();
        return view('entrepreneur.index',["entrepreneurs" => $entrepreneurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrepreneur = new Entrepreneur;
        return view('entrepreneur.create', ["entrepreneur" => $entrepreneur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrepreneur = new Entrepreneur;
        $entrepreneur->id_user = $request->id_user;
        $entrepreneur->name = $request->name;
        $entrepreneur->address = $request->address;
        $entrepreneur->birthdate = $request->birthdate;
        $entrepreneur->age = Carbon::parse($request->birthdate)->age;
        // $entrepreneur->identity = $request->identity;
        // $entrepreneur->bank_account = $request->banck_account;
        // $entrepreneur->profile_picture = $request->profile_picture;
        $entrepreneur->save();
        return redirect('/entrepreneur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrepreneur = Entrepreneur::find($id);
        return view('entrepreneur.detail', [ "entrepreneur" => $entrepreneur] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrepreneur = Entrepreneur::find($id);
        return view('entrepreneur.edit', [ "entrepreneur" => $entrepreneur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entrepreneur = Entrepreneur::find($id);
        $entrepreneur->name = $request->name;
        $entrepreneur->address = $request->address;
        $entrepreneur->birthdate = $request->birthdate;
        $entrepreneur->save();
        return redirect('/entrepreneur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entrepreneur::destroy($id);
        return redirect('entrepreneur');
    }
}
