<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taco;
use Illuminate\Support\Facades\Session;

class TacoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tacos = Taco::all();

        return view('taco.index')->with('tacos', $tacos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taco.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taco = new Taco();

        if ($taco->addIngredients($request->toArray())){
            $taco->save();
            Session::flash('success_message', 'Taco added!');
            return redirect('/');
        }

        else {
            Session::flash('error_message', 'Bad ingredients, try again');
            return redirect('/create');
        }

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
        Taco::destroy($id);
        Session::flash('success_message', 'Taco removed!');
        return redirect('/');
        //
    }
}
