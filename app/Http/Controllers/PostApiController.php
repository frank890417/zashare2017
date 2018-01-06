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
        return Post::all(
            "id","company","tag","title","cover","year","updated_at"
        );
    }
    public function show($id){
        $result = Post::find($id);
        return $result;
    }
    public function update($id){
        $inputs = Input::all();
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
        $post->delete();
        return ["status"=>"success"];
    }
    public function store(){
        $inputs = Input::all();
        $post = Post::create($inputs);
        
        $post = Post::find($post->id);
        return $post;
    }
}

