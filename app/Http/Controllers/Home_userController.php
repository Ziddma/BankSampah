<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sampah;
use Illuminate\Http\Request;

class Home_userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home_user');
    }
}
