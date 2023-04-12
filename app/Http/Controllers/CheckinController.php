<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\CookiesTrait;

class CheckinController extends Controller
{
	use CookiesTrait;

	public function index(Request $request)
	{
		if ($this->getCookie('user'))
			return redirect('/dashboard');
		else
			return view('checkin');
	}

	public function submitCheckin(Request $request)
	{
		$rules = [
			'user_pass' => 'required|string|max:255',
			'user_email' => 'required|string|email|max:255'
		];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect('/checkin')->withInput()->withErrors($validator);
		} else {
			$data = $request->input();
			$checkUser = User::where('email', '=', $data['user_email'])->first();
			if ($checkUser) {
				$checkUser = User::where('password', '=', Hash::check($checkUser->password, $data['user_pass']))->first();
				if ($checkUser) {
					$this->setcookie('user', $checkUser);
					return redirect('/dashboard'); //view('Layout.userstats', compact($checkUser));
				} else
					return redirect()->back()->withErrors(['msg' => 'Incorrect password.']);
			} else
				return redirect()->back()->withErrors(['msg' => 'Incorrect details.']);
		}

		return true;
	}
}
