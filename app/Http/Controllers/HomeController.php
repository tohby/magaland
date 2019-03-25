<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Magazine;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User::get();
        $today = Carbon::today();
        $magazines = Magazine::where('closure', '>', $today)->get();
        return view('home')->with('magazines', $magazines);
    }
}
