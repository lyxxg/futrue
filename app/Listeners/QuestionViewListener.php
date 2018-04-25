<?php

namespace App\Listeners;

use App\Events\QuestionViewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuestionViewListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  QuestionViewEvent  $event
     * @return void
     */
    function onView($event){
        //如果是新用户，就颁发一个随机标识
        if(!session('user_str',false)){
            session()->put('user_str',str_random(20));
            session()->put('user_view',[]);//将他看过的id存到session
        }


        //检查用户是否查看过该提问，如果没看过就增加浏览量，并且标识他看过该文章
        $views = session('user_view');
        if(!in_array($event->question->id, $views)){//如果用户的session没有词问题id浏览量加一
            $event->question->view++;
            $event->question->save();
            //记录该用户看过该提问
            $views[] = $event->question->id;
            session()->put('user_view', $views);
        }



    }



    public function subscribe($events){
      $events->listen(
           QuestionViewEvent::class,
            QuestionViewListener::class."@onView"
        );

    }

}
