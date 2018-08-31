<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Optimizely\Optimizely;
// use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $uri = $request->path('https://cdn.optimizely.com/datafiles/3Qk9ptHUUq82E8oeJgDUDN.json');
        // $datafile = file_get_contents('https://cdn.optimizely.com/datafiles/3Qk9ptHUUq82E8oeJgDUDN.json');
        
        // // Instantiate an Optimizely client
        // $optimizelyClient = new Optimizely($datafile);
        // $userId = Hash::make('plain-text');
        
        // // $userId = 'test';
        // $variation = $optimizelyClient->activate('test_laravel', $userId);
        $variation = '';
        
        // dd($userId, $variation);
        return view('experiment')->withVariation($variation);
    }
}
