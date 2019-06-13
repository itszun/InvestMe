<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Offer;
use InvestMe\Entrepreneur;
use InvestMe\Investor;

class APIController extends Controller
{
    public function offer()
    {
        $id = auth()->user()->id;
        $offers = Account::find($id)->offers;
        $n= 0;
        foreach($offers as $o) 
        {
            $user = Account::find($o->to)->usertype;
            $name = $user->name;
            $offers[$n]->targets = $name;
            $n++;
        };
        return response()->json(['offers'=>$offers], 200);
    }

    public function reject($id)
    {
        $offer = Offer::find($id);
        return response()->json(['id'=>$id], 200);
    }
    public function approve($id)
    {
        $offer = Offer::find($id);
        $offer->approved = 1;
        $offer->save();
        return response()->json(['id'=>$id], 200);
    }

    public function transfer($id)
    {
        $offer = Offer::find($id)->where('approved',1)->first(['id', 'from', 'to', 'id_business']);
        $to = $offer->to;
        $entre = Entrepreneur::find(2)->where('id_user',$to)->first();
        return response()->json(['x'=>$offer->to]);
    }
}
