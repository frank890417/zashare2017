<?php

namespace App\Http\Controllers;

use App\Expo;
use Illuminate\Http\Request;

class ExpoController extends Controller
{
    //

    public function index(){
        return  Expo::all();
    }
    public function show($id){
        $result = Expo::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $expo = Expo::find($id);
        $expo->update($inputs);
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
        $expo = Expo::create($inputs);
        
        $expo = Expo::find($expo->id);
        return $expo;
    }
}
