<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use InvestMe\Account;
use InvestMe\Entrepreneur;
use InvestMe\Investor;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $acc = Account::where('id',$id)->first();
        $level = auth()->user()->level;
        if($level == 2)
        {
            $data = Account::find($id)->investor; 
        }
        else if($level == 1)
        {
            $data = Account::find($id)->entrepreneur;
        }
        $contact = Account::find($id)->contact;
        return view('account.profile', ['acc' => $acc, 'data' => $data, 'contact'=>$contact]);
    }

    public function edit()
    {
        $id = auth()->user()->id;
        $level = auth()->user()->level;
        if($level == 2)
        {
            $data = Account::find($id)->investor; 
            $model = new Investor;
        }
        else if($level == 1)
        {
            $data = Account::find($id)->entrepreneur;
            $model = new Entrepreneur;
        }
        $contact = Account::find($id)->contact;
        return view('account.edit', ['data' => $data, 'level' => $level, 'model' => $model, 'contact' => $contact]);
    }
}
