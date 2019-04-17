<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\Contribution;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('magazine/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('magazine/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store new magazine to database
        $this->validate($request, [
            'volume' => 'required',
            'closure'  => 'required',
            'final_closure' => 'required',
        ]);

        $magazine = Magazine::create([
          'magazine_volume' => $request->input('volume'),
          'closure' => $request->input('closure'),
          'final_closure' => $request->input('final_closure'),
        ]);

        return redirect('/')->with('success', '<b>'. $magazine->magazine_volume . '</b>' . ' has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //return all contrubitions associated to a magazines
        //show only contributiions of a student
        $contributions = Contribution::
        //show only contributions of a faculty
        $magazine = Magazine::find($magazine)->first();
        return view('magazine/index')->with('magazine', $magazine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        //
    }
}
