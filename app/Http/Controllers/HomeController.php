<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CookiesTrait;

class HomeController extends Controller
{
	use CookiesTrait;
	public function __construct()
	{
		if (!$this->hasCookie('user')) {
			return redirect()->to('/checkin')->send();
		}
	}

	public function getUserInfo()
	{
		$userInfo = $this->getCookie('user');
		dd($userInfo);
	}

	public function dashboard(Request $request)
	{
		// dd(json_decode($this->getCookie('user'))->id);
		return view('Layout.userstats');
	}
}
