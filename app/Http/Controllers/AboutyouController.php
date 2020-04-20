<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

use Carbon\Carbon;
use Auth;
use DB;

use App\User;
use App\Hair;

class AboutyouController extends Controller
{
    public function index()
    {
        $hairs = Hair::get();
        return view('pages.aboutyou', compact('hairs'));
    }
}
