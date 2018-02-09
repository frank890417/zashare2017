<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class PostApiController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        // select(
        //     ["id","tag","title","cover","year","updated_at"]
        // )->get();

        foreach($posts as $post){
            // echo $post->company ;
            $post["company"] = $post->company;
            $post["cata"] = $post->cata;
            $post["content"] = str_replace("&nbsp;","",mb_substr(strip_tags($post->content),0,100,"utf-8"));
            $post["teach_thing"] = "";
            $post["learn_thing"] = "";
        }
        return $posts;
    }
    public function show($id){
        $result = Post::where("id",$id)->with("company")->first();
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
        $inputs["hashtag"]=json_encode($inputs["hashtag"]);
        $post = Post::find($id);
        $post->update($inputs);
        $result =  $post;

        return [
            "status"=>"success",
            "data"=>$result
        ];
    }
    public function destroy($id){
        $post = Post::find($id);
        // return ($id);
        // return $post;
        // if ($post){
        $post -> delete();
        // }
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $inputs["hashtag"]=json_encode($inputs["hashtag"]);
        $post = Post::create($inputs);
        
        $post = Post::find($post->id);
        return [
            "status"=>"success",
            "data"=>$post
        ];
    }
}

