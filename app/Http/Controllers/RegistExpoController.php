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

        return  RegistExpo::with(['PaidRecord','RegistWorkshop','RegistExpoSpeak'])->get();
    }
    
    public function my(){
        $user = $this->guard()->user();

        $RegistExpo = RegistExpo::where('user_id',$user->id)->with(['PaidRecord','RegistWorkshop','RegistExpoSpeak'])->first();;
        return $RegistExpo;
    }
    public function show($id){
        $result = RegistExpo::find($id);
        return $result;
    }
    
    ///////沒有更新！！！！
    public function update($id){
        // $studentcard =  User::find($user->id)->studentcard;
        
        $inputs = Input::get(["registexpo"]);
        unset($inputs['deleted_at']); 
        unset($inputs['created_at']); 

        // paid_record

        // dd($inputs);
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
        unset($inputs['deleted_at']); 
        unset($inputs['created_at']); 

        $inputs['user_id']=$user->id;
        $RegistExpo = RegistExpo::where('user_id',$user->id)->first();;


        //檢查三個子紀錄是否存在，
        // 如果有就更新
        if (array_key_exists( 'paid_record',$inputs) ){
            if ($inputs['paid_record']){
                $paid_record = $inputs['paid_record'];
                $obj = PaidRecord::firstOrCreate(['registexpos_id'=>$RegistExpo->id]);
                $obj->registexpos_id= $RegistExpo->id;
                $obj->update( $paid_record);
                $obj->save();
            }
            unset($inputs['paid_record']); 
        }
        if (array_key_exists( 'regist_expo_speak',$inputs)){
            if ($inputs['regist_expo_speak']){
                $regist_expo_speak = $inputs['regist_expo_speak'];
                $obj = RegistExpoSpeak::updateOrCreate(['registexpos_id'=>$RegistExpo->id]);
                $obj->registexpos_id= $RegistExpo->id;
                $obj->update( $regist_expo_speak);               
                $obj->save();
            }
            unset($inputs['regist_expo_speak']);
        }
        if (array_key_exists( 'regist_workshop',$inputs)){
            if ($inputs['regist_workshop']){               
                $regist_workshop = $inputs['regist_workshop'];
                $obj = RegistWorkshop::updateOrCreate(['registexpos_id'=>$RegistExpo->id]);
                $obj->registexpos_id= $RegistExpo->id;
                $obj->update( $regist_workshop);               
                $obj->save();
            }
            unset($inputs['regist_workshop']); 
        }


        $RegistExpo->update($inputs);
        $result= RegistExpo::where('user_id',$user->id) ->with(['PaidRecord','RegistExpoSpeak','RegistWorkshop'])->get() ->first();
        
        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $RegistExpo = RegistExpo::find('user_id',$id);
        $RegistExpo->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::get(["registexpo"]);
        $user = $this->guard()->user();
        $inputs['user_id']=$user->id;
        if ( !RegistExpo::find($user->id)){
            $RegistExpo = RegistExpo::forceCreate($inputs);
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