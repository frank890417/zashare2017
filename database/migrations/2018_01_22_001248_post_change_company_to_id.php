<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Post;
use App\Cata;
use App\Company;

class PostChangeCompanyToId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('posts',function($table){
          $table->integer('company_id')->nullable();
        });
        $posts = Post::all();
        foreach ($posts as $post){
            $ctag = $post->company;
            $company = Company::getByTag($ctag);
            echo $post->id." -> ".$company->id.":".$company->name_cht." \n";
            $post->company_id=$company->id;
            $post->save();
        }

        Schema::table('posts',function($table){
          $table->renameColumn("company", "old_company_tag");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // you have to custom reset databaseSchema::table('posts',function($table){
        
        Schema::table('posts',function($table){
            $table->dropColumn(["company_id"]);
            $table->renameColumn( "old_company_tag","company");
        });
    }
}
