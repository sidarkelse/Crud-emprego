<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprego;

class EmpregoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprego = Emprego::all();
        return view('index', compact('emprego'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' =>'required|max:255',
        'email'=> 'required|max:255',
        'phone'=> 'required|numeric',
        ]);
        $emprego = Emprego::create($storeData);

        return redirect('/empregos')->with('completed','Emprego criado');
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
        $emprego = Emprego::findOrFail($id);
        return view('update', compact('emprego'));
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
        $data = $request->validate([
            'name' =>'required|max:255',
            'email'=> 'required|max:255',
            'phone'=> 'required|numeric',
        ]);
        Emprego::whereId($id)->update($data);
        return redirect('/empregos')->with('completed','Empregos updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprego = Emprego::findOrFail($id);
        $emprego->delete();

        return redirect('/empregos')->with('completed','Emprego deletado');

    }
}
