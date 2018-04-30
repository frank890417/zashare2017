<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\RegistWorkshop;
class RegistWorkshopController extends Controller {

   // 
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    public function index(){
        return  RegistWorkshop::all();
    }
    public function show($id){
        $result = RegistWorkshop::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $RegistWorkshop = RegistWorkshop::find($id);
        $RegistWorkshop->update($inputs);
        $result =  $RegistWorkshop;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $RegistWorkshop = RegistWorkshop::find($id);
        $RegistWorkshop->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $RegistWorkshop = RegistWorkshop::create($inputs);
        
        $RegistWorkshop = RegistWorkshop::find($RegistWorkshop->id);
        return $RegistWorkshop;
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