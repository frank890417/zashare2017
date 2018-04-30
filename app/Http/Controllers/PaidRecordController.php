<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PaidRecord;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaidRecordController extends BaseController {

   // 
    public function index(){
        return  PaidRecord::all();
    }
    public function show($id){
        $result = PaidRecord::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $PaidRecord = PaidRecord::find($id);
        $PaidRecord->update($inputs);
        $result =  $PaidRecord;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $PaidRecord = PaidRecord::find($id);
        $PaidRecord->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $PaidRecord = PaidRecord::create($inputs);
        
        $PaidRecord = PaidRecord::find($PaidRecord->id);
        return $PaidRecord;
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