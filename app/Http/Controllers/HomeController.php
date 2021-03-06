<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;
use App\Cata;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }


    
    public function spa()
    {
      return view("layouts/app_spa");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = Input::all();
        $posts = DB::table('posts')
                ->where('status',"published")
                ->join('companies','companies.id','=','posts.company_id')
                ->leftjoin('catas',function ($join) {
                    $join->on('posts.year','=','catas.year')->on('posts.tag','=','catas.tag');
                })
                ->orderBy('stick_top_cata','DESC')
                ->orderBy('tag','ASC')
                ->select('posts.*','companies.name_cht','companies.name_short','catas.name as cataname')
                ->get();


        $catalist = Cata::all();
        $show_posts= DB::table('posts')
                   ->where('status',"published")
                   ->where('stick_top_index',"1")
                   ->join("companies",'companies.id','=','posts.company_id')
                    ->leftjoin('catas',function ($join) {
                        $join->on('posts.year','=','catas.year')->on('posts.tag','=','catas.tag');
                    })
                   ->where('cover','!=','')->inRandomOrder()->limit(10)
                   ->get(['posts.*' , 'companies.name_cht']);

        foreach ($posts as $post){
            unset($post->content);
        }

        return view('posts')
              ->with('title','雜學校-文章閱讀平台')
              ->with('pagename','blog')
              ->with('posts',$posts)
              ->with('filter',isset($input['filter'])?$input['filter']:'')
              ->with('show_posts',$show_posts)
              ->with('catalist',$catalist);
    }


    public function postpage_api()
    {
        $posts = DB::table('posts')
                ->where('status',"published")
                ->join('companies','companies.id','=','posts.company_id')
                ->leftjoin('catas',function ($join) {
                    $join   
                        // ->on('posts.year','=','catas.year')
                        ->on('posts.cata_id','=','catas.id');
                })
                ->orderBy('stick_top_cata','DESC')
                // ->orderBy('tag','ASC')
                ->select('posts.*','companies.name_cht','companies.name_short','catas.name as cataname')
                ->get();


        $catalist = Cata::all();
        $show_posts= DB::table('posts')
                   ->where('status',"published")
                   ->where('stick_top_index',"1")
                   ->join("companies",'companies.id','=','posts.company_id')
                   ->where('cover','!=','')->inRandomOrder()->limit(10)
                   ->get(['posts.*' , 'companies.name_cht']);

        foreach ($posts as $post){
            unset($post->content);
        }

        return [
          'posts'=> $posts,
          'show_posts'=> $show_posts,
          'catalist'=> $catalist
        ];
    }

    // public function news(){
    //   return view('news')
    //           ->with('pagename','news')
    //           ->with('title','最新消息');

    // }

    // public function about(){
    //   return view('about')
    //           ->with('pagename','about')
    //           ->with('title','關於雜學校');

    // }

    public function landing(){
      return view('landing')->with('title','雜學校-百百種學習的面貌');
    }
    

    // public function expo(){
    //   return view('expo')
    //         ->with('pagename','expo')
    //         ->with('title','過去展覽成果');
    // }

    public function funding(){
      return view('funding')
            ->with('pagename','fund')
            ->with('title','募資頁面');
    }


    public function pacman(){
      return view('pacman')
            ->with('pagename','fund')
            ->with('title','募資頁面');
    }
}
