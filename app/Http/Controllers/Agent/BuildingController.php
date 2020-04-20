<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Property;
use App\Building;
use App\Feature;
use App\PropertyImageGallery;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::latest()
                              ->withCount('comments')
                              ->where('agent_id', Auth::id())
                              ->paginate(10);
        
        return view('agent.building.index',compact('buildings'));
    }

    public function show(Building $building)
    {
        $building = Building::withCount('comments')->find($building->id);
        // $videoembed = $this->convertYoutube($building->video, 560, 315);
        return view('agent.building.show',compact('building'));
    }

}
