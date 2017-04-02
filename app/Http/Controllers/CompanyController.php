<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    //
    function index(){
      $all = Company::all();

      return view("company_manage")
          ->with("companies",$all);
    }

     //新增攤位
    public function create()
    {
      return view('company_edit')
          ->with('title','新增攤位資料');
    }

    //進入編輯文章頁面
    public function edit($id)
    {
      $company=Company::find($id);

      return view('company_edit')
            ->with('title','編輯-'.$company->name_cht)
            ->with('company',$company);
    }

    //儲存文章 
    public function store()
    {
      $input=Input::all();
      return Redirect::to('post');
    }
    
    function find_by_tag($tag){
      $company=Company::where('tag',$tag)->get();
      if (count($company)>0)
      	return $company[0];
      else
      	return [];
    }

    //更新文章資料
    public function update($id)
    {
      $input=Input::all();
      $company=Company::find($id);
    
      $company->update($input);

      return Redirect::to('company');


    }

    //刪除文章
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return Redirect::to('post');
    }

}
