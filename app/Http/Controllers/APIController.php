<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Offer;

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
        $offer = Offer::destroy($id);
        return response()->json(['id'=>$id], 200);
    }
    public function approve($id)
    {
        $offer = Offer::find($id);
        $offer->approved = 1;
        $offer->save();
        return response()->json(['id'=>$id], 200);
    }
}
