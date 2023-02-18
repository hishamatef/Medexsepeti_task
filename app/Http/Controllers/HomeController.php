<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
    protected $home;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $home)
    {
        $this->home = $home;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }
    public function home()
    {
        $data = $this->home->getHomeData();
        return view('welcome',$data);
    }
}
