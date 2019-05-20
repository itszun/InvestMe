<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Business;
use InvestMe\Sector;
use InvestMe\Account;

class BusinessController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $lvl = auth()->user()->level;
        if($lvl == 1){
            $md = Account::where('id', $id)->with('business','business.sector')->get();
            foreach($md as $m)
            {
                $busy = $m->business;
            }
            return view('business.index', ['business' => $busy, 'md' => $md]);
        }
        $md = Business::with('sector','owner')->get();
        return view('business.all', ['md'=>$md]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $md = new Business;
        $sct = Sector::select('name','id')->get();
        // $sct = $sct->toArray();
        return view('business.create', ['business' => $md, 'sector' => $sct]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:100',
            'founded' => 'required',
            'address' => 'required',
            'description' => 'required',
            'sector' => 'required',
            'contact' => 'required',
        ]);
        $dt = new Business;
        $id = auth()->user()->id;
        $dt->owner = $id;
        $dt->name = $request->name;
        $dt->founded = $request->founded;
        $dt->address = $request->address;
        $dt->description = $request->description;
        $dt->sector = $request->sector;
        $dt->contact = $request->contact;
        $dt->save();
        return redirect('business');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lvl = auth()->user()->level;
        if($lvl == 1){
            $user = auth()->user()->id;
            $md = Business::find($user)->with('sector')->where('id',$id)->first();
            return view('business.detail', ['bs' => $md]);
        }
        $md = Business::find($id)->with('owner', 'sector')->first();
        return view('business.investor.detail', ['bs' => $md]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bs = new Business;
        $user = auth()->user()->id;
        $md = Business::find($user)->with('sector')->where('id',$id)->first();
        $sct = Sector::select('name','id')->get();
        return view('business.edit', ['bs'=>$md, 'business' => $bs,'sector' => $sct]);
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
        //
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
