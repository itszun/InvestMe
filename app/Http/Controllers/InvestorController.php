<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Investor;
use InvestMe\Account;
use InvestMe\Contact;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inv = Investor::all();
        return view('investor.index', ['investor' => $inv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $x = new Investor;
        return view('investor.create', ["x" => $x]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x = new Investor;
        $x->id_user = $request->id_user;
        $x->name = $request->name;
        $x->address = $request->address;
        $x->birthdate = $request->birthdate;
        $x->age = Carbon::parse($request->birthdate)->age;
        // $x->identity = $request->identity;
        // $x->bank_account = $request->banck_account;
        // $x->profile_picture = $request->profile_picture;
        $x->save();
        return redirect('/investor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $x = Investor::find($id);
        return view('investor.detail', [ "x" => $x] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $x = Investor::find($id);
        return view('investor.edit', [ "x" => $x]);
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
        $x = Investor::find($id);
        $x->name = $request->name;
        $x->address = $request->address;
        $x->birthdate = $request->birthdate;
        $x->save();
        return redirect('/investor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Investor::destroy($id);
        return redirect('investor');
    }
}
