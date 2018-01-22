<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Post;
use App\Cata;
class PostChangeCataToId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  
        Schema::table('posts',function($table){
          $table->integer('cata_id')->nullable();
        });
        $posts = Post::all();
        foreach ($posts as $post){
            $cata = Cata::where("tag",$post->tag)->where("year","2016")->first();
            echo $post->id." -> ".$cata->id.":".$cata->name." \n";
            $post->cata_id=$cata->id;
            $post->save();
        }
        Schema::table('posts',function($table){
          $table->renameColumn("tag", "old_cata_tag");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts',function($table){
            $table->dropColumn(["cata_id"]);
            $table->renameColumn( "old_cata_tag","tag");
        });
    }
}
