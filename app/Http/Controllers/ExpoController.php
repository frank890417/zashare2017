<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Expo;
use Illuminate\Http\Request;
use Auth;
class ExpoController extends Controller
{
    /**
     * Create a new ExpoController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index','show']]);
    }

    public function index(){
        return Expo::orderBy('year','desc')->get();
    }
    public function show($id){
        $result = Expo::find($id);
        return $result;
    }
    public function update($id){
        
        $inputs = Input::all();
        $expo = Expo::find($id);
        $expo->update( $inputs['data'] );
        $result =  $expo;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $expo = Expo::find($id);
        $expo->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $expo = Expo::create( $inputs['data'] );
        
        $expo = Expo::find($expo->id);
        return $expo;
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
