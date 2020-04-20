<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Property;
use App\House;
use App\Feature;
use App\PropertyImageGallery;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::latest()
                              ->withCount('comments')
                              ->join('buildings', 'buildings.id', '=', 'houses.building')
                              ->where('buildings.agent_id', Auth::id())
                              ->paginate(10);
        
        return view('agent.house.index',compact('houses'));
    }

    public function show(House $house)
    {
        $house = House::withCount('comments')->find($house->id);
        // $videoembed = $this->convertYoutube($building->video, 560, 315);
        return view('agent.house.show',compact('house'));
    }

}
