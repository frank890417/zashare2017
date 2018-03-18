<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use App\Studentcard;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login','register','redirectToProvider','handleProviderCallback']]);
    }
    
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        $redirectUrl = "https://service.zashare.org/api/auth/login/facebook/callback";
        return Socialite::driver('facebook')->stateless()->redirectUrl($redirectUrl)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $token = JWTAuth::fromUser($user);

        return $token;

        // $user->token;
    }

    public function register(Request $request){
        $newUser = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'job' => $request->input('job'),
            'jobcata' => $request->input('jobcata'),
            'password' => bcrypt($request->input('password'))
        ];
        $require_fields = ["email","name","job","jobcata","password"];
        foreach($require_fields as $field){
            if (!$newUser[$field]){
                return response()->json([
                    "status" => "fail",
                    "error" => "欄位未填".$field
                ]);
            }
        }

        $user = User::create($newUser);
        $token = JWTAuth::fromUser($user);

        return $token;
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => '登入失敗'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $userdata = $this->guard()->user();
        $studentcard =  User::find($userdata->id)->studentcard;
        if ( !$studentcard ){
            $findcard = Studentcard::where("email",$userdata->email)->first();
            if ($findcard){
                $findcard->user_id = $userdata->id;
                $findcard->save();
                $studentcard=$findcard;
            }
        }
        $userdata["studentcard"] = $studentcard;

        return response()->json($userdata);
    }

     /**
     * Update user info (job / jobcata / name)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInfo()
    {
        $inputs = Input::all();
        $newdata = $inputs['user'];
        if ($newdata){
            $userdata = $this->guard()->user();
            $userdata['name'] = $newdata['name'];
            $userdata['job'] = $newdata['job'];
            $userdata['jobcata'] = $newdata['jobcata'];
            // $studentcard =  User::find($userdata->id)->studentcard;
            // if ( !$studentcard ){
            //     $findcard = Studentcard::where("email",$userdata->email)->first();
            //     if ($findcard){
            //         $findcard->user_id = $userdata->id;
            //         $findcard->save();
            //         $studentcard=$findcard;
            //     }
            // }
            // $userdata["studentcard"] = $studentcard;
            $userdata->save();
            return response()->json($userdata);
        }
        
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'message' => '已成功登出！',
            'status' => 'success'
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}