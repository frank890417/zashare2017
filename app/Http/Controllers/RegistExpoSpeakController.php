<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RegistExpoSpeak;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class RegistExpoSpeakController extends Controller {

  // 
    public function index(){
        return  RegistExpoSpeak::all();
    }
    public function show($id){
        $result = RegistExpoSpeak::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $RegistExpoSpeak = RegistExpoSpeak::find($id);
        $RegistExpoSpeak->update($inputs);
        $result =  $RegistExpoSpeak;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $RegistExpoSpeak = RegistExpoSpeak::find($id);
        $RegistExpoSpeak->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $RegistExpoSpeak = RegistExpoSpeak::create($inputs);
        
        $RegistExpoSpeak = RegistExpoSpeak::find($RegistExpoSpeak->id);
        return $RegistExpoSpeak;
    }

}

?>