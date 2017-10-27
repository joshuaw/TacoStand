<?php

namespace App\Http\Controllers;

use App\Burger;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $burgers = Burger::all();

        return view('burger.index')->with('burgers', $burgers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('burger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $burger = new Burger();

        if ($burger->addIngredients($request->toArray())){
            $burger->save();
            Session::flash('success_message', 'Burger added!');
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
     * @param  \App\Burger  $burger
     * @return \Illuminate\Http\Response
     */
    public function show(Burger $burger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Burger  $burger
     * @return \Illuminate\Http\Response
     */
    public function edit(Burger $burger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Burger  $burger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Burger $burger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Burger  $burger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Burger $burger)
    {
        Burger::destroy($burger->id);
        Session::flash('success_message', 'Burger removed!');
        return redirect('/burger');
    }
}
