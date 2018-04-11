<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupontype;
use App\Coupon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class CoupontypeController extends Controller
{
    // 
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    public function index(){
        $user = $this->guard()->user();
        if ($user && $user->group=="admin"){
            return Coupontype::with("coupons")->get();
        }else{
            return null;
        }
    }
    public function userindex(){
        $all = Coupontype::all();
        // return  $this->guard();
        $user = $this->guard()->user();
        $studentcard =  User::find($user->id)->studentcard;
        foreach($all as $ct){
            $ct['my'] = Coupon::where("cata_id",$ct->id)->where("user_id",$user->id)->first();
            $canget = json_decode($ct->user_can_get);
            $ct['can_get'] = false;
            if ( in_array("studentcard", $canget) && $studentcard  ){
                $ct['can_get'] = true;
            }
            
            if ( in_array("admin", $canget) && $user->group=="admin" ){
                $ct['can_get'] = true;
            }
        }
        return $all;
    }
    public function show($id){
        $result = Coupontype::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $coupontype = Coupontype::find($id);
        $coupontype->update($inputs);
        $result =  $coupontype;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $coupontype = Coupontype::find($id);
        $coupons = $coupontype->coupons;
        foreach($coupons as $coupon){
            $coupon->delete();
        }

        $coupontype->delete();


        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::except('coupons');
        $coupontype = Coupontype::create($inputs);
        $coupontype = Coupontype::find($coupontype->id);


        $coupons = Input::get('coupons');
        $coupons_array = explode("\n",$coupons );

        foreach($coupons_array as $couponcode){
            $coupon = Coupon::create([
                "cata_id" => $coupontype->id,
                "coupon" => $couponcode,
                "active_datetime" => $coupontype->active_datetime,
                "expiry_datetime" => $coupontype->expiry_datetime,
            ]);

        }

        return $coupontype;
    }
    public function getCoupon($id){
        $user = $this->guard()->user();
        $coupontype = Coupontype::find($id);
        if (Coupon::where("cata_id",$id)->where("user_id",$user->id)->first() ){
            return Coupon::where("cata_id",$id)->where("user_id",$user->id)->first();
        }else{
            $coupon = Coupon::where("cata_id",$id)->where("user_id",null)->where("used",false)->first();
            $coupon->user_id = $user->id;
            $coupon->save();
            return $coupon;
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

}
