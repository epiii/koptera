<?php
// epiEdit jacurtis login
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}

	public function showLoginForm(){
		return view('auth.admin-login');
	}
	public function login(Request $request){
		// validate form
		$this->validate($request,[
			'email'=>'required|email',
			'password'=>'required|min:6',
		]);

		// attempt log the user in
		if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)) {
			return redirect()->intended(route('admin.dashboard'));
		}
		// fail
		return redirect()->back()->withInput($request->only('email','remember'));
		// return redirect()->withInput($request->only('email','remember'));

	}

}
