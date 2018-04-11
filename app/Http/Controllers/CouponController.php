<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class CouponController extends Controller
{
    // 
    public function index(){
        return  Coupon::all();
    }
    public function show($id){
        $result = Coupon::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $coupon = Coupon::find($id);
        $coupon->update($inputs);
        $result =  $coupon;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $coupon = Coupon::create($inputs);
        
        $coupon = Coupon::find($coupon->id);
        return $coupon;
    }


}
