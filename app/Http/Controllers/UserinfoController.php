<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;


use App\User;

use Carbon\Carbon;
use Auth;
use DB;

class UserinfoController extends Controller
{
    public function index()
    {
        return view('pages.userinfo');
    }
}
