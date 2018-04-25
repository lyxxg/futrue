<?php

namespace App\Http\Controllers\Futrue;

use App\Models\QuestionTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagArticleController extends Controller
{
    public function tagarticle(Request $id){
        $tag_id=$id->id;
        $articles=QuestionTag::all()->whereIn('tag_id',$tag_id);

        return view("Futrue.tagarticle", compact('articles'));

    }
}
