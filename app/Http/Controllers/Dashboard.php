<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $transactions = Auth::user()->transactions()->paginate(12);
        return view('Dashboard',compact('user','transactions'));
    }
    public function transaction()
    {
    }
}
