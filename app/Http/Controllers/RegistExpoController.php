<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use File;
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

                //將講座簡報搬移到資料夾
                try{
                    if (strrpos( $obj->startup_proposal, "Zac報名(已送出)")==false){
                        $newname = "ZA".str_pad($RegistExpo->id,3,'0',STR_PAD_LEFT).'-'.$RegistExpo->name_cht.'-Zac報名.pdf';
                        $fullpath = "Zac報名(已送出)/".$newname;
                        
                        try{
                            Storage::disk('public')->delete($fullpath);
                        } catch(Exception $e){
                        }
                        Storage::disk('public')->copy($obj->startup_proposal,$fullpath);
                        $obj->startup_proposal="/stroage/app/public/".$fullpath;
                    }
                } catch(Exception $e){
                    
                }


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
                
                //將工坊簡報搬移到資料夾
                try{
                    if (strrpos( $obj->class_proposal, "雜工坊報名(已送出)")==false){
                        $newname = "ZA".str_pad($RegistExpo->id,3,'0',STR_PAD_LEFT).'-'.$RegistExpo->name_cht.'-工坊報名.pdf';
                        $fullpath = "雜工坊報名(已送出)/".$newname;
                        
                        try{
                            Storage::disk('public')->delete($fullpath);
                        } catch(Exception $e){
                        }
                        Storage::disk('public')->copy($obj->class_proposal,$fullpath);
                        $obj->class_proposal="/stroage/app/public/".$fullpath;
                    }
                } catch(Exception $e){
                    
                }

                $obj->save();
            }

            
            

            unset($inputs['regist_workshop']); 
        }


        $RegistExpo->update($inputs);
        try{
            if (strrpos($RegistExpo->file_proposal, "參展簡報(已送出)")==false){
                $newname = "ZA".str_pad($RegistExpo->id,3,'0',STR_PAD_LEFT).'-'.$RegistExpo->name_cht.'-參展簡報.pdf';
                $fullpath = "參展簡報(已送出)/".$newname;
                
                try{
                    Storage::disk('public')->delete($fullpath);
                } catch(Exception $e){
                }
                Storage::disk('public')->copy($RegistExpo->file_proposal,$fullpath);
                $RegistExpo->file_proposal="/stroage/app/public/".$fullpath;
                $RegistExpo->save();
            }
        } catch(Exception $e){
            
        }
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
        if ( !RegistExpo::where("user_id",$user->id)->first() ){
            $RegistExpo = RegistExpo::forceCreate($inputs);
            //搬移參展簡報到正式資料夾
            try{
                if (strrpos($RegistExpo->file_proposal, "參展簡報(已送出)")==false){
                    $newname = "ZA".str_pad($RegistExpo->id,3,'0',STR_PAD_LEFT).'-'.$RegistExpo->name_cht.'-參展簡報.pdf';
                    $fullpath = "參展簡報(已送出)/".$newname;
                    
                    try{
                        Storage::disk('public')->delete($fullpath);
                    } catch(Exception $e){
                    }
                    Storage::disk('public')->copy($RegistExpo->file_proposal,$fullpath);
                    $RegistExpo->file_proposal="/stroage/app/public/".$fullpath;
                    $RegistExpo->save();
                }
            } catch(Exception $e){
                
            }
        }else{
            return ["status"=>"fail, user has already registed"];
        }
        return $RegistExpo;
    }

    //確認繳費
    public function confirmPaid(){
        $inputs = Input::all();

        // var_dump($inputs);
        $user = $this->guard()->user();
        if ($user->group=="admin"){
             $obj = PaidRecord::where('id',$inputs['id'])->first();
            //  echo $obj;
             $obj->confirmed=$inputs['value'];
             $obj->save();
            return ["status"=> "success","confirmed"=>$obj->confirmed ];
        }else{
            return ["status"=> "fail, not admin.","confirmed"=>$obj->confirmed ];
        }

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



    public function uploadtemp(){
        //上傳暫時檔案
        $input_file = Input::file('file');
        $user = $this->guard()->user();
        // var_dump($input_file );
        // exit;
        $folder="/2018/展覽報名/".$user->id."/";
        $use_filename=date("Y-m-d H:i:s")."-參展暫存資料.".$input_file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($folder,$input_file ,$use_filename);

        
        return $folder.$use_filename;

    }
  
}

?>