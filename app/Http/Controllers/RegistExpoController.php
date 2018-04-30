<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RegistExpo;
use App\RegistExpoSpeak;
use App\RegistWorkshop;
use App\PaidRecord;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RegistExpoController extends Controller {

   // 
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    public function index(){
        return  RegistExpo::with(['PaidRecord','RegistWorkshop','RegistExpoSpeak'])->first();
    }
    public function show($id){
        $result = RegistExpo::find($id);
        return $result;
    }
    public function update($id){
        // $studentcard =  User::find($user->id)->studentcard;
        
        $inputs = Input::get(["registexpo"]);
        
        $RegistExpo = RegistExpo::find($id);
        $RegistExpo->update($inputs);
        $result =  $RegistExpo;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function updateMyData(){
        
        $inputs = Input::get(["registexpo"]);
        $user = $this->guard()->user();
        
        $inputs['user_id']=$user->id;
        $RegistExpo = RegistExpo::find($user->id);
        $RegistExpo->update($inputs);
        $result =  $RegistExpo;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $RegistExpo = RegistExpo::find($id);
        $RegistExpo->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::get(["registexpo"]);
        $user = $this->guard()->user();
        $inputs['user_id']=$user->id;
        if ( !RegistExpo::find($user->id)){
            $RegistExpo = RegistExpo::create($inputs);
            $RegistExpo = RegistExpo::find($RegistExpo->id);
        }else{
            return ["status"=>"fail, user has already registed"];
        }
        return $RegistExpo;
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

?>