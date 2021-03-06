<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;
use App\Cata;
use App\Company;

class PostController extends Controller
{
    // 顯示所有文章
    public function index()
    {
        $posts = DB::table('posts')
                ->leftjoin('companies','posts.company_id','=','companies.id')
                ->leftjoin('catas',function ($join) {
                    $join->on('posts.year','=','catas.year')->on('posts.tag','=','catas.tag');
                })
                ->orderBy('tag')
                ->select('posts.*','companies.name_cht','companies.name_short','catas.name as cataname')
                ->get();
        // $posts_group = DB::table('posts')
        //         ->join('companies','posts.company','=','companies.tag')
        //         ->join('catas','posts.tag','=','catas.tag')
        //         ->select('posts.*','companies.name_cht','catas.name as cataname')
        //         ->orderBy('cata')


        $catas = Cata::all();


    

        $catalist=[];
        foreach ($catas as $cata)
          $catalist[$cata->tag]=$cata->name;

        return view('manage.post_manage')
              ->with('posts',$posts)
              ->with('catalist',$catalist);
    }

    // 顯示單篇文章
    public function show($id)
    {
      $post= Post::find($id);
      $company = Company::where('tag',$post->company)->first();
      $catas = Cata::all();    

      $related_posts=Post::where('tag','=',$post->tag)
                      ->inRandomOrder()
                      ->limit(2)->get();

      $post->content=$this->html_cleaner($post->content);

      $catalist=[];
      foreach ($catas as $cata)
        $catalist[$cata->tag]=$cata->name;

      return view('show')
            ->with('title','文章編輯 - '.$post->title)
            ->with('post',$post)
            ->with('pagename','blog')
            ->with('company',$company)
            ->with('related_posts',$related_posts)
            ->with('catalist',$catalist);
    }



    // 顯示單篇文章
    public function show_name($title)
    {
      $post = Post::where('title',$title)->first();
      $company = Company::where('tag',$post->company)->where('year',$post->year)->first();

      $catas = Cata::all();    

      $related_posts=Post::where('tag','=',$post->tag)
                      ->inRandomOrder()
                      ->limit(2)->get();

      $post->content=$this->html_cleaner($post->content);
      $catalist=[];
      foreach ($catas as $cata)
        $catalist[$cata->tag]=$cata->name;

      return view('show')
            ->with('title','文章編輯 - '.$post->title)
            ->with('post',$post)
            ->with('pagename','blog')
            ->with('company',$company)
            ->with('related_posts',$related_posts)
            ->with('catalist',$catalist);
    }

    // 顯示單篇文章
    public function show_name_api($title)
    {
      $post = Post::where('title',$title)->first();
      $company = $post->company;

      $catas = Cata::all();    

      $related_posts=Post::where('cata_id','=',$post->cata_id)
                      ->inRandomOrder()
                      ->limit(2)->get();

      $post->content=$this->html_cleaner($post->content);
      $catalist=[];
      foreach ($catas as $cata)
        $catalist[$cata->tag]=$cata->name;

      return [
        "title"=> $post->title,
        "post"=> $post,
        "company"=> $company,
        "related_posts"=> $related_posts,
        "catalist"=> $catalist,
        "og"=>[
          "title"=>"【 ".$company->name_cht." 】".$post->title,
          "type"=>"website",
          "url"=>url()->current(),
          "cover"=>$post->cover,
          "description"=>$post->description
        ]
      ];
    }

    public function spa_post($title){
      $post = Post::where('title',$title)->first();
      $company =  $post ->company;
      return view("layouts/app_spa")->
        with([
          "meta_og"=>[
            "title"=>"【 ".$company->name_cht." 】".$post->title,
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>trim($post->cover),
            "description"=>trim($post->description)
          ]
        ]);
    }

    //新增文章
    public function create()
    {
      $catas = Cata::all();

      return view('manage.edit')
          ->with('title','新增文章')
          ->with('catas',$catas);
    }

    //儲存文章 
    public function store()
    {
      $input=Input::all();
      $input['content']=$this->html_cleaner($input['content']) ;
      $input['established_time']=date("Y-m-d H:i:s");
      $input['created_at']=date("Y-m-d H:i:s");

      $post=Post::create($input);

      
      // $post->title=$input['title'];
      // $post->content = $this->html_cleaner($input['content']) ;
      // $post->tag = $input['tag'];
      // $post->company = $input['company'];
      // $post->description= $input['description'];
      // $post->author = $input['author'];
      // $post->cover = $input['cover'];
      // $post->established_time = date("Y-m-d H:i:s");
      // $post->created_at = date("Y-m-d H:i:s");
      // $post->save();

      return Redirect::to('manage/post');
    }
  
    //進入編輯文章頁面
    public function edit($id)
    {
      $post=Post::find($id);
      $catas=Cata::all();
      $post->content=$this->html_cleaner($post->content) ;
      return view('manage.edit')
            ->with('pagename','post')
            ->with('title','編輯-'.$post->title)
            ->with('post',$post)
            ->with('catas',$catas);
    }

    public function html_cleaner($str){

      $re = '/style=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/class=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/align=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/lang=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/\<span class="author-p-.*?\"\>(.*?)\<\/span>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      $re = '/\<div.*?\"\>(.*?)\<\/div>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      $str=str_replace("&nbsp;</p>","</p>",$str);
      $str=str_replace("../../dropzone","/dropzone",$str);
      $str=str_replace("..//dropzone","/dropzone",$str);
      $str=str_replace("../dropzone","/dropzone",$str);
      // $str=str_replace("..//","/",$str);
      // $str=str_replace("//","/",$str);

      return $str;

    }

    //更新文章資料
    public function update($id)
    {
      $input=Input::all();
      $post=Post::find($id);
      $input['content']=$this->html_cleaner($input['content']) ;
      $input['established_time']=date("Y-m-d H:i:s");
      $input['updated_at']=date("Y-m-d H:i:s");
    
      $post->update($input);

      return Redirect::to('manage/post');


    }

    //刪除文章
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return Redirect::to('manage/post');
    }
 
    // api / 依照攤位號碼尋找文章
    public function find_by_tag($tag){
      $post=Post::where('tag',$tag)->get();
      return $post;
    }

    // api / 依照文章名稱尋找文章
    public function get_title($title){
      $post=Post::where('title',$title)->get();
      return $post;
    }

    // api / 取出文章裡所有的圖片
    public function get_images($id)
    {
      $post=Post::find($id);
      $re = '/img.*src=\"(.*)\"/';
      $str = $post->content;

      preg_match_all($re, $str, $matches);

      $imgurl=[];

      // Print the entire match result
      return $matches[1];
    }


    // api / 取得所有文章
    public function get_all(){
      $posts = DB::table('posts')
              ->join('companies','posts.old_company_tag','=','companies.tag')
              ->select('posts.*','companies.name_cht','companies.name_short')
              ->get();

      return $posts;
    }

    public function get_all_published(){
      $posts = DB::table('posts')
              ->join('companies','posts.old_company_tag','=','companies.tag')
              ->select('posts.*','companies.name_cht','companies.name_short')
              ->where('status','published')
              ->get();

      foreach ($posts as $post) {
        $post->content="";
      }

      return $posts;
    }

    

    //api / 取得相關文章
    public function get_relate(){
      $posts = Post::where('status',"published")->get();
      $len = count($posts)-1;
      $num1 = rand(0,$len);
      $num2 = rand(0,$len);

      while($num1==$num2){
        $num2 = rand(0,$len);
      }

      return array($posts->get($num1),$posts->get($num2));

    }

    //api / 測試用
    public function test()
    {
      
      return str_random(50);
      
    }

    //api / 取得所有類型
    public function cata_all(){
      $cata = Cata::all();
      return $cata;
    }

    //web 更新文章類別
    public function cata_edit(){
      $input = Input::all();
      $catas = Cata::all();
      return view("manage.cataedit")
              ->with('pagename','cata')
              ->with("catas",$catas);
    }

    //Tag
    public function cata_update(){
      $input = Input::all();
      $catas = Cata::all();
      
      for($i=1;$i<=intval($input['count']);$i++){
        $cata = Cata::find($i);
        $cata->tag=$input["tag_".$i];
        $cata->name=$input["name_".$i];
        $cata->year=$input["year_".$i];
        $cata->save();
      }

      if ($input["name"]!=""){
        $cata::create([
          "tag"=> $input["tag"],
          "name"=> $input["name"],
          "year"=> $input["year"]
        ]);
      }
      return Redirect::to('manage/cata');
    }

}
