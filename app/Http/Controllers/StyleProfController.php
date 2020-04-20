<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Cookie\CookieJar;
use Cookie;
use App\Mail\Contact;

use App\Freestyle;
use App\Workstyle;
use App\Neverwear;
use App\Brand;
use App\Age;
use App\Tempstyle;
use App\User;


use Carbon\Carbon;
use Auth;
use DB;

class StyleProfController extends Controller
{
    public function index()
    {
        $value = Cookie::get('mycookie');
        // exit($value);

        $freestyles = Freestyle::get();
        $workstyles = Workstyle::get();
        $neverwears = Neverwear::get();
        $brands = Brand::get();
        $ages = Age::get();
        return view('pages.styleprof', compact('freestyles','workstyles', 'neverwears', 'brands', 'ages'));
    }

    public function store(Request $request){
        // $tempstyle = new Tempstyle();
        // $tempstyle->freestyle = $request->hi_fr;
        // $tempstyle->workstyle = $request->hi_ws;
        // $tempstyle->neverwear = $request->hi_ns;
        // $tempstyle->brand = $request->hi_br;
        // $tempstyle->age = $request->hi_age;
        // $tempstyle->save();
        return redirect()->route('login');
        
    }

    public function save(){
        $favor_free = $_POST['favor_free'];
        $favor_ws = $_POST['favor_ws'];
        $favor_ns = $_POST['favor_ns'];
        $favor_br = $_POST['favor_br'];
        $favor_age = $_POST['favor_age'];

        var_dump($favor_frees);
        exit;
    }
}
