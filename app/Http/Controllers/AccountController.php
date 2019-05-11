<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Contact;

class AccountController extends Controller
{
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $level = auth()->user()->level;
        if($level == 1){
            $x = Account::find($id)->entrepreneur;
        }else if ($level == 2){
            $x = Account::find($id)->investor;
        }
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
}
