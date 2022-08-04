<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function index() {
		return view('login');
	}
	public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("loged/home");
        }
  
        return  redirect()->route('login')->with('error', 'Wrong email or password!!');
    }

    public function registration()
    {
        return view('registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
			'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
        auth()->login($user);

		return redirect("loged/home");
    }

    public function create(array $data)
    {
		return User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => Hash::make($data['password'])
		]);
    }    

    
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
