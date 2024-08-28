<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sampah;
use Illuminate\Http\Request;

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
        $users = User::count();

        $widget = [
            'users' => $users,
            // Add other widgets here...
        ];

        $totalBerat = Sampah::sum('berat');

        return view('home', compact('widget', 'totalBerat'));
    }
}
