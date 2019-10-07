<?php

namespace App\Frontend\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        return 'phone';
    }

    public function showLoginForm() {
        return view('frontend::auth.login');
        //return 'hello';
    }



    /*
    protected function credentials(Request $request)
    {

        dd($request->get('email'));
        if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }
    */


    protected function validateLogin(Request $request)
    {
      $this->validate($request, [
        //$this->username() => 'required',
        'password' => 'required',
      ]);
    }



    public function login(Request $request)
    {

        //dd($request);
        $this->validateLogin($request);
        /*
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        */

        if(Auth::attempt(['phone' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/');
        }

        //$this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


}
