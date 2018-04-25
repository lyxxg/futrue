<?php

namespace App\Http\Controllers\App\Futrue;

use App\Models\Focu;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FutrueController extends Controller
{
    public function index(){

        $articles=Question::where('del', 0)
            ->orderBy('created_at', 'desc')->paginate(6);
        $focus = \Redis::get('focus');
        if ($focus == null)//焦点图不是经常要修改  因为我懒
        {
            $focus = Focu::all();
            \Redis::set("focus",$focus);
        }

        $focus=json_decode($focus);
        $taghots = Tag::all()->sortByDesc('hot')->take(10);
        echo json_encode($articles);
    }
}
