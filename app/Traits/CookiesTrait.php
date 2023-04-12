<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;

trait CookiesTrait
{
    // COOKIES
    public function setcookie($cookiename, $value)
    {
        Cookie::queue($cookiename, $value, 120);
        return response()->json(['Cookie set successfully.']);
    }

    public function getCookie($cookiename)
    {
        $value = Cookie::get($cookiename);
        return $value;
    }

    public function hasCookie($cookiename) {
        return Cookie::has($cookiename);
    }

    // public function deleteCookie($cookiename)
    // {
    //     Cookie::queue(
    //         Cookie::forget($cookiename)
    //     );
    //     // dd($this->getCookie($cookiename));
    //     return true;
    // }
}
