<?php

namespace App\Http\Middleware;

use Optimizely\Optimizely;
use Illuminate\Support\Facades\Hash;
use Closure;
use Cookie;


class CheckVariation
{

    private $url;
    private $environment;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $environment = env('APP_ENV');
        // $userId = '';

        $url['dev'] = 'https://cdn.optimizely.com/datafiles/3Qk9ptHUUq82E8oeJgDUDN.json';
        $url['staging'] = 'https://cdn.optimizely.com/datafiles/Pqr1KagfVi7p4J7RLmhwx1.json';
        $url['prod'] = 'https://cdn.optimizely.com/datafiles/SYLVyQGBK7sX97jR8zRdGY.json';

        // Check environment and get data file
        if ($environment === 'local') {
            $datafile = file_get_contents($url['dev']);
        } else if ($environment === 'staging') {
            $datafile = file_get_contents($url['staging']);
        } else if ($environment === 'production') {
            $datafile = file_get_contents($url['prod']);
        }
        
        // dd($datafile);

        // Instantiate an Optimizely client
        $optimizelyClient = new Optimizely($datafile);

        // Get cookie to see if the userId exist
        $cookie = $request->cookie('userId');
        $userId = $cookie;

        // dd($userId);

        // If there is no cookie, create userId using Hash
        if ($cookie === null) {
            $userId = Hash::make('plain-text');
            // $cookie = cookie('userId', $userId, 10);
            Cookie::queue('userId', $userId, 10);
        }

        // Get variation
        $variation = $optimizelyClient->activate('test_laravel', $userId);

        dd($variation);

        return $next($request);
    }
}
