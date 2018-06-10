<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class FutrueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
   //查询公告和热门标签
        $test=new \Redis();
   $announcement=\Redis::get("announcement");
        if($announcement==null){
            $announcement=Announcement::all()->last();
            \Redis::set("announcement",$announcement);
        }
        $announcement=json_decode($announcement);
        $articlehots=Question::all()->sortByDesc('view')->take(10);
        $futruetags=\Redis::get("futruetags");
        if($futruetags==null){
            $futruetags=Tag::all();
            \Redis::set("futruetags",$futruetags);
        }
        $futruetags=json_decode($futruetags);
        view()->share("futruetags",$futruetags);
        view()->share('announcement',$announcement);
        view()->share('questionhots',$articlehots);    

 }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
