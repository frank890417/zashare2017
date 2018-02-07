<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/manage/post';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function postLogin(Request $request)
    {
        $auth = false;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $auth = true; // Success
            return  Auth::user();
        }

        // if ($request->ajax()) {
        //     return response()->json([
        //         'auth' => $auth,
        //         // 'intended' => URL::previous()
        //     ]);
        // } else {
        //     return "login fail";
        //     // return redirect()->intended(URL::route('dashboard'));
        // }
        // return redirect(URL::route('login_page'));
    }
}
