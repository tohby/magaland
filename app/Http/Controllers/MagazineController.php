<?php

namespace App\Http\Controllers;

use App\User;
use App\Magazine;
use App\Contribution;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $today = Carbon::today();
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
            'magazine_volume' => 'required|unique:magazines',
            'closure'  => 'required|date|after:yesterday',
            'final_closure' => 'required|date|after:closure',
        ]);

        $magazine = Magazine::create([
          'magazine_volume' => $request->input('magazine_volume'),
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
        $today = Carbon::today();
        $faculty = auth()->user()->faculty_id;
        if (auth()->User()->role === 0) {
            //show only contributions of a student under a magazine
            $contributions = Contribution::where('magazine_id', $magazine->id)->where('user_id', $user_id)->get();
            $magazine = Magazine::find($magazine->id);
            return view('magazine/index')->with('magazine', $magazine)->with('contributions', $contributions)->with('today', $today);
        } else if(auth()->User()->role === 1) {
            $contributions = Contribution::where('magazine_id', $magazine->id);
            $magazine = Magazine::find($magazine->id);
            $students = User::with('contributions')->whereHas('contributions', function ($query) use($magazine) {
                $query->where('magazine_id', $magazine->id);
            })->where('faculty_id', $faculty)->get();
            return view('magazine/index')->with('magazine', $magazine)->with('contributions', $contributions)->with('today', $today)->with('students', $students);
        }
    }

    public function studentContribution(Magazine $magazine, User $user){
        $magazine = Magazine::find($magazine->id);
        $user = User::find($user->id);
        $contributions = Contribution::where('magazine_id', $magazine->id)->where('user_id', $user->id)->get();
        return view('coordinator/studentContributions')->with('user', $user)->with('magazine', $magazine)->with('contributions', $contributions);
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
