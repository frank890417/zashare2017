<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RegistExpo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class RegistExpoController extends Controller {

   // 
    public function index(){
        return  RegistExpo::with(['PaidRecord','RegistWorkshop','RegistExpoSpeak'])->get();
    }
    public function show($id){
        $result = RegistExpo::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $RegistExpo = RegistExpo::find($id);
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
        $inputs = Input::all();
        $RegistExpo = RegistExpo::create($inputs);
        
        $RegistExpo = RegistExpo::find($RegistExpo->id);
        return $RegistExpo;
    }

  
}

?>