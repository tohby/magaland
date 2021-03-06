<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Contribution;
use App\Magazine;
use Carbon\Carbon;
use App\Notifications\FileUploaded;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // validate form
        // make sure temrs and condtions are accepted
        //
        $this->validate($request, [
            'title' => 'required',
            'terms' => 'required',
            'volume_id'  => 'required',
            'user_id' => 'required',
            'file' => 'required|file|max:5000|mimes:jpeg,png,pdf',
        ]);

        if($request->hasFile('file')){
            //get file name with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('file')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('file')->storeAs('public/contributions', $fileNameToStore);
        }else {
            $fileNameToStore = "noSubmission";
        }

       $contribution = Contribution::Create([
            'title' => $request->input('title'),
            'magazine_id' => $request->input('volume_id'),
            'user_id' => $request->input('user_id'),
            'file_type' => $extension,
            'file' => $fileNameToStore,
        ]);
        $faculty = Auth::user()->faculty_id;
        $coordinator = User::where('faculty_id',$faculty)->where('role', 1)->first();
        User::find($coordinator->id)->notify(new FileUploaded($contribution));
        return redirect('/')->with('success', 'Contribution added');
        // return $coordinator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(Contribution $contribution)
    {
        $contribution = Contribution::find($contribution->id);
        $magazine = Magazine::find($contribution->magazine_id);
        $today = Carbon::today();
        return view('contribution/index')->with('contribution', $contribution)->with('magazine', $magazine)->with('today', $today);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Contribution $contribution)
    {
        //
        $contribution = Contribution::find($contribution->id);
        return view('student/edit_contribution')->with('contribution', $contribution);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contribution $contribution)
    {
        //
        $this->validate($request, [
            'file' => 'file|max:5000|mimes:jpeg,png,pdf',
        ]);

        if($request->hasFile('file')){
            //get file name with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('file')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('file')->storeAs('public/contributions', $fileNameToStore);
        }else {
            $fileNameToStore = "noSubmission";
        }

        
        $contribution->title = $request->input('title');
        if($request->hasFile('file')) {
            $contribution->file = $fileNameToStore;
            $contribution->file_type = $extension;
        }
        $contribution->save();
        return redirect('/contributions/'.$contribution->id)->with('success', "contribution has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contribution $contribution)
    {
        //
        $contribution = Contribution::find($contribution->id);
        $contribution->delete();
        return redirect('/')->with('success', "Contribution has been deleted");
    }
}
