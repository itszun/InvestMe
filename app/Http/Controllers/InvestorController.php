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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $x = Account::find($id)->investor;
        $x->name = $request->name;
        $x->address = $request->address;
        $x->birthdate = $request->birthdate;
        $x->save();
        $y = Account::find($id)->contact;
        $length = count($request->contact);
        $core = count($y);
        for ($i=0; $i < $length; $i++) { 
            if($length > $core){
                if($i >= $core)
                {
                    $contact = new Contact;
                    $contact->id_user = $id;
                    $contact->number = $request->contact[$i];
                    $contact->save();
                }
            }
            if($i < $core){
            $y[$i]->number = $request->contact[$i];
            $saved = $y[$i]->save();
            }
            if($length < $core)
            {
                if($i == $length-1){
                    $over = $core - $length;
                    for ($n=1; $n <= $over ; $n++) { 
                        $y[$i+$n]->delete();
                    }
                }
            }
        
        };
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
