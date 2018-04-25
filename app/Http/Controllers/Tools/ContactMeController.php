<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;



class ContactMeController extends Controller
{
    public function contactme(){

        return view("tools.contactme");
    }


}
