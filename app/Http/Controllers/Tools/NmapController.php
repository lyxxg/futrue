<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NmapController extends Controller
{
    public function Nmap(){
return view("tools.nmap");
    }
}
