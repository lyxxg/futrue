<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Testcontroller extends Controller
{
    public function testajax(){
		
		Auth::id();
	}
}
