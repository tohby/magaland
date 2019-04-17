<?php

namespace App\Http\Controllers;

use App\User;
use App\Contribution;
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
        //
        $this->validate($request, [
            'terms' => 'required',
            'volume_id'  => 'required',
            'user_id' => 'required',
            'file' => 'required'
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
            'magazine_id' => $request->input('volume_id'),
            'user_id' => $request->input('user_id'),
            'file_type' => $extension,
            'file' => $fileNameToStore,
        ]);
        User::find(1)->notify(new FileUploaded);
        return redirect('/')->with('success', 'Contribution added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(Contribution $contribution)
    {
        //
        // $myContributions = Contribution::
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
    }
}
