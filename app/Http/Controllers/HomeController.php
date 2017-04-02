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
                ->join('companies','companies.tag','=','posts.company')
                ->join('catas','catas.tag','posts.tag')
                ->orderBy('tag','ASC')
                ->select('posts.*','companies.name_cht','companies.name_short','catas.name as cataname')
                ->get();


        $catalist = Cata::all();
        $show_posts= DB::table('posts')
                   ->where('status',"published")
                   ->join("companies",'companies.tag','=','posts.company')
                   ->where('cover','!=','')->inRandomOrder()->limit(10)
                   ->get(['posts.*' , 'companies.name_cht']);

        foreach ($posts as $post){
            unset($post->content);
        }

        return view('posts')
              ->with('title','雜學校-文章閱讀平台')
              ->with('posts',$posts)
              ->with('filter',isset($input['filter'])?$input['filter']:'')
              ->with('show_posts',$show_posts)
              ->with('catalist',$catalist);
    }

    public function about(){
      return view('about')
              ->with('title','關於雜學校');

    }

    public function landing(){
      return view('landing')->with('title','雜學校-百百種學習的面貌');
    }
    

    public function expo(){
      return view('expo')
            ->with('title','過去展覽成果');
    }
}
