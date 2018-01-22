<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cata;
class CataApiController extends Controller
{
    // 
    public function index(){
        return  Cata::all();
    }
    public function show($id){
        $result = Cata::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $cata = Cata::find($id);
        $cata->update($inputs);
        $result =  $cata;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $cata = Cata::find($id);
        $cata->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $cata = Cata::create($inputs);
        
        $cata = Cata::find($cata->id);
        return $cata;
    }


}
