<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyApiController extends Controller
{
    //
     // 
    public function index(){
        return  Company::all();
    }
    public function show($id){
        $result = Company::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $company = Company::find($id);
        $company->update($inputs);
        $result =  $company;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $company = Company::find($id);
        $company->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $company = Company::create($inputs);
        
        $company = Company::find($company->id);
        return $company;
    }

}
