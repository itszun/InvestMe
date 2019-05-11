<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Offer;
use InvestMe\User;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $offers = Account::find($id)->offers;
        $request = Account::find($id)->request;
        $targets = [];
        $n = 0;
        foreach($offers as $o) 
        {
            $user = Account::find($o->to)->investor;
            $name = $user->name;
            $offers[$n]->targets = $name;
            $n++;
        };
        $targets = [];
        $n = 0;
        foreach($request as $r) 
        {
            $user = Account::find($r->from)->entrepreneur;
            $name = $user->name;
            $request[$n]->targets = $name;
            $n++;
        };
        return view('offer.detail', ['offers' => $offers, 'request' => $request]);
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
        $offer = new Offer;
        $offer->from = $request->fromId;
        $offer->to = $request->toId;
        $offer->fund = $request->fund;
        $offer->share = $request->sharing;
        $offer->party_approval1 = 1;
        $offer->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers = Account::find($id)->offers;
        $request = Account::find($id)->request;
        $targets = [];
        $n = 0;
        foreach($offers as $o) 
        {
            $user = Account::find($o->to)->investor;
            $name = $user->name;
            $offers[$n]->targets = $name;
            $n++;
        };
        $targets = [];
        $n = 0;
        foreach($request as $r) 
        {
            $user = Account::find($r->from)->entrepreneur;
            $name = $user->name;
            $request[$n]->targets = $name;
            $n++;
        };
        $id = auth()->user()->id;
        dd($id);
        return view('offer.detail', ['offers' => $offers, 'request' => $request]);
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
    
    public function Investor($id)
    {
        $offer = new Offer;
        $party2 = Account::find($id)->investor;
        return view('offer.create', ['party2' => $party2, 'offer' => $offer]);
    }

    public function approve(Request $request)
    {   
        $offer = Offer::find($request->id);
        $offer->party_approval2 = 1;
        $offer->save();
        return redirect('/offer');
    }
}
