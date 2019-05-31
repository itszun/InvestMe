<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Offer;
use InvestMe\User;
use InvestMe\Entrepreneur;
use InvestMe\Business;
use InvestMe\Sector;

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
        $offers = Account::find($id)->offers->where("approved",0);
        $request = Account::find($id)->request->where("approved",0);
        $targets = [];
        $n = 0;
        $offers = $offers->toArray();
        foreach($offers as $o) 
        {
            $user = Account::find($o['to'])->usertype;
            $name = $user->name;
            $offers[$n]['targets'] = $name;
            $n++;
        };
        $targets = [];
        $n = 0;
        $request = $request->toArray();
        foreach($request as $r) 
        {
            $user = Account::find($r['from'])->usertype;
            $name = $user->name;
            $request[$n]['targets'] = $name;
            $n++;
        };
        return view('offer.detail', ['offers' => $offers, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $target = Account::find($id)
            ->with([
                'entrepreneur' => function($query){
                    $query->select('id','id_user','name','balance','profile_picture');
                },
                'investor' => function($query){
                    $query->select('id','id_user','name','occupation','balance','profile_picture');
                },
                'business' => function($query){
                    $query->select('id', 'name', 'owner');
                }])
            ->where('id',$id)->first(
                ['id','username','level']
            );
        // $target = Account::where('id',$id)->first();
        $target = $target->toArray();
        $tlvl = $target['investor'] == null ? $target['entrepreneur'] : $target['investor'];
        $tb = $target['business'] == null ? false : $target['business'];
        if($tb)
        {
            $business = Business::with('owner')->where('owner', $id)->pluck('name','id');
        }else{
            $uid = auth()->user()->id;
            $business = Business::with('owner')->where('owner', $uid)->pluck('name','id');
        }
        $offer = new Offer;
        return view('offer.create', ['party2' => $tlvl, 'offer' => $offer, 'target' => $target, 'business' => $business]);
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
        $offer->from = auth()->user()->id;
        $offer->to = $request->toId;
        $offer->id_business = $request->business;
        $offer->fund = $request->fund;
        $offer->share = $request->sharing;
        $offer->approved = 0;
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
        $md = null;
        return view('offer.create', ['party2' => $party2, 'offer' => $offer, 'bs' => $md]);
    }
    
    public function Entrepreneur($id)
    {
        $offer = new Offer;
        $party2 = Entrepreneur::find($id)->with('account','account.business')->first();
        $md = Account::with('business')->where('id', $id)->first();
        $md = $md->getRelation('business');
        return view('offer.create', ['party2' => $party2, 'offer' => $offer, 'business' => $md]);
    }

    public function approve(Request $request)
    {   
        $offer = Offer::find($request->id);
        $offer->party_approval2 = 1;
        $offer->save();
        return redirect('/offer');
    }

    public function reject($offer_id)
    {
        // $offer = Offer::find($request->$offer_id);
        // $offer->delete();
        $id = $offer_id;
        return response()->json(['id'=>$id], 200);
    }
    
    public function contract()
    {
        $id = auth()->user()->id;
        $offers = Account::find($id)->offers->where("party_approval2",0);
        $request = Account::find($id)->request->where("party_approval2",0);
        $targets = [];
        $n = 0;
        $offers = $offers->toArray();
        foreach($offers as $o) 
        {
            $user = Account::find($o['to'])->usertype;
            $name = $user->name;
            $offers[$n]['targets'] = $name;
            $offers[$n]['offer'] = "offer";
            $n++;
        };
        $targets = [];
        $n = 0;
        $request = $request->toArray();
        foreach($request as $r) 
        {
            $user = Account::find($r['from'])->usertype;
            $name = $user->name;
            $request[$n]['targets'] = $name;
            $request[$n]['request'] = "request";
            $n++;
        };
        $contract = array_merge($offers, $request);
        return view('offer.contract', ['contract' => $contract]);
    }

}
