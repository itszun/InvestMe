<?php

namespace InvestMe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InvestMe\Entrepreneur;

class EntrepreneurController extends Controller
{
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
        DB::table('entrepreneur')->insert([
            'id_user' => $request->id_user,
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'address' => $request->address,
            'identity' => $request->identity,
            'bank_account' => $request->bank_account,
            'profile_picture' => $request->profile_picture 
        ]);
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
        return view('entrepreneur.edit', [ "entrepreneur" => $entrepreneur] );
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
        $entrepreneur->name = $name;
        // $entrepreneur->save()
        // DB::table('entrepreneur')->where('id', $id)->update([
        //     // 'id_user' => $request->id_user,
        //     'name' => $request->name,
        //     // 'birthdate' => $request->birthdate,
        //     // 'age' => $request->age,
        //     // 'address' => $request->address,
        //     // 'identity' => $request->identity,
        //     // 'bank_account' => $request->bank_account,
        //     // 'profile_picture' => $request->profile_picture 
        // ]);
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
