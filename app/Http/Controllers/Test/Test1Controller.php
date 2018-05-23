<?php

namespace App\Http\Controllers\Test;

use App\Jobs\JobTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Test1Controller extends Controller
{
    public function test(){
JobTest::dispatch("s")->delay(Carbon::now()->addMinutes(10));
    }
}
