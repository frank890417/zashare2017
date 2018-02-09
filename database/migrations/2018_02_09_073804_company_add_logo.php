<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Company;
class CompanyAddLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('companies',function($table){

          $table->string('logo')->nullable();

        });
        
        $company2017 = Company::where("year","2017")->get();
        foreach($company2017 as $company){
            $tag = preg_replace("/\p{Han}+/u", '', $company->tag);
            $company->logo = "https://service.zashare.org/img/2017/expo_2017/teamlogos/".substr($tag,0,1)."/".$tag.".jpg";
            $company->save();
        }

        $company2016 = Company::where("year","2016")->get();
        foreach($company2016 as $company){
            $tag = preg_replace("/\p{Han}+/u", '', $company->tag);
            $company->logo = "http://2016.zashare.org/img/square_logos/".$tag.".jpg";
            $company->save();
        }


        // $company2016 = Company::where("year","2017")->get();
        // foreach($company2016 as $company){
        //     $company->logo = "https://service.zashare.org/img/2017/expo_2017/teamlogos/".substr($company->tag,0,1)."/".$company->tag.".jpg";
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('companies',function($table){

          $table->dropColumn('logo');
        });
    }
}
