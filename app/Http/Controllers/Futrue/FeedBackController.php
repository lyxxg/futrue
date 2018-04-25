<?php

namespace App\Http\Controllers\Futrue;

use App\Models\FeedBack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedBackController extends Controller
{
    public function feedback(){
        return view("Futrue.feedback");
    }

    public function feedbackdata(Request $data){
        $feedback=new FeedBack();
        $feedback->content=$data->content;
            $feedback->user_id=Auth::id();
        $feedback->save();
//        dd($data->all());
        return redirect('feedbackyes');
    }

    public function feedbackyes(){
        return view("Futrue.feedbackyes");
    }
}
