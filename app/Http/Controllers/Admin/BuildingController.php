<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Building;
use App\Feature;
use App\BuildingImageGallery;
use App\Comment; 

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class BuildingController extends Controller
{

    public function index()
    {
        $buildings = Building::latest()->withCount('comments')->get();

        return view('admin.building.index',compact('buildings'));
    }


    public function create()
    {   
        $features = Feature::all();

        return view('admin.building.create',compact('features'));
    }


    public function store(Request $request)
    {   
        $request->validate([
            'agent'      => 'required',
            'title'     => 'required|unique:properties|max:255',
            'city'      => 'required',
            'address'   => 'required',
            'area'      => 'required',
            'parking'      => 'required',
            'parking_price'      => 'required',
            'gallaryimage'     => 'required',
            'image'=> 'image|mimes:jpeg,jpg,png',
            'floor_plan'=> 'image|mimes:jpeg,jpg,png',
            'description'        => 'required',
            // 'location_latitude'  => 'required',
            // 'location_longitude' => 'required',
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('Building')){
                Storage::disk('public')->makeDirectory('Building');
            }
            $featuredimage = Image::make($image)->save($imagename);
            Storage::disk('public')->put('Building/'.$imagename, $featuredimage);

        }else{
            $imagename = 'default.png';
        }

        $floor_plan = $request->file('floor_plan');
        if(isset($floor_plan)){
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-'.$currentDate.'-'.uniqid().'.'.$floor_plan->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('Building')){
                Storage::disk('public')->makeDirectory('Building');
            }
            $buildingfloorplan = Image::make($floor_plan)->save($imagefloorplan);
            Storage::disk('public')->put('Building/'.$imagefloorplan, $buildingfloorplan);

        }else{
            $imagefloorplan = 'default.png';
        }

        $building = new building();
        $building->title    = $request->title;
        $building->slug     = str_slug($request->title);
        $building->parking_price    = $request->parking_price;
        $building->parking     = $request->parking;
        $building->image    = $imagename;
        $building->city     = $request->city;
        $building->city_slug= str_slug($request->city);
        $building->address  = $request->address;
        $building->area     = $request->area;

        if(isset($request->featured)){
            $building->featured = true;
        }
        $building->agent_id             = $request->agent;
        $building->description          = $request->description;
        $building->video                = $request->video;
        $building->floor_plan           = $imagefloorplan;
        $building->location_latitude    = $request->location_latitude;
        $building->location_longitude   = $request->location_longitude;
        $building->nearby               = $request->nearby;

        $building->save();

        $building->features()->attach($request->features);


        $gallary = $request->file('gallaryimage');

        if($gallary)
        {
            foreach($gallary as $images)
            {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['building_id'] = $building->id;
                
                if(!Storage::disk('public')->exists('building/gallery')){
                    Storage::disk('public')->makeDirectory('building/gallery');
                }
                $buildingimage = Image::make($images)->save($galimage['name']);
                Storage::disk('public')->put('building/gallery/'.$galimage['name'], $buildingimage);

                $building->gallery()->create($galimage); 
            }
        }

        Toastr::success('message', 'Building created successfully.');
        return redirect("admin/building");
    }


    public function show(Building $building)
    {   
        $building = Building::withCount('comments')->find($building->id);

        $videoembed = $this->convertYoutube($building->video, 560, 315);

        return view('admin.building.show',compact('building','videoembed'));
    }


    public function edit(Building $building)
    {
        $features = Feature::all();
        $building = Building::find($building->id);

        $videoembed = $this->convertYoutube($building->video);

        return view('admin.building.edit',compact('building','features','videoembed'));
    }


    public function update(Request $request, $building)
    {
        $request->validate([
            'agent'      => 'required',
            'title'     => 'required|unique:properties|max:255',
            'city'      => 'required',
            'address'   => 'required',
            'area'      => 'required',
            'parking'      => 'required',
            'parking_price'      => 'required',
            'GallaryImage'     => 'required',
            'image'=> 'image|mimes:jpeg,jpg,png',
            'floor_plan'=> 'image|mimes:jpeg,jpg,png',
            'description'        => 'required',
            // 'location_latitude'  => 'required',
            // 'location_longitude' => 'required',
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        $building = Building::find($building->id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('building')){
                Storage::disk('public')->makeDirectory('building');
            }
            if(Storage::disk('public')->exists('building/'.$building->image)){
                Storage::disk('public')->delete('building/'.$building->image);
            }
            $featuredimage = Image::make($image)->save($imagename);
            Storage::disk('public')->put('building/'.$imagename, $featuredimage);

        }else{
            $imagename = 'default.png';
        }


        $floor_plan = $request->file('floor_plan');
        if(isset($floor_plan)){
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-'.$currentDate.'-'.uniqid().'.'.$floor_plan->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('building')){
                Storage::disk('public')->makeDirectory('building');
            }
            if(Storage::disk('public')->exists('building/'.$building->floor_plan)){
                Storage::disk('public')->delete('building/'.$building->floor_plan);
            }

            $buildingfloorplan = Image::make($floor_plan)->save($imagefloorplan);
            Storage::disk('public')->put('building/'.$imagefloorplan, $buildingfloorplan);

        }else{
            $imagefloorplan = 'default.png';
        }

        $building->title    = $request->title;
        $building->slug     = str_slug($request->title);
        $building->parking_price    = $request->parking_price;
        $building->parking     = $request->parking;
        $building->image    = $imagename;
        $building->city     = $request->city;
        $building->city_slug= str_slug($request->city);
        $building->address  = $request->address;
        $building->area     = $request->area;

        if(isset($request->featured)){
            $building->featured = true;
        }else{
            $building->featured = false;
        }
        $building->agent_id             = $request->agent;
        $building->description          = $request->description;
        $building->video                = $request->video;
        $building->floor_plan           = $imagefloorplan;
        $building->location_latitude    = $request->location_latitude;
        $building->location_longitude   = $request->location_longitude;
        $building->nearby               = $request->nearby;

        $building->save();

        $building->features()->sync($request->features);

        $gallary = $request->file('gallaryimage');
        if($gallary){
            foreach($gallary as $images){
                if(isset($images))
                {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                    $galimage['size'] = $images->getClientSize();
                    $galimage['building_id'] = $building->id;
                    
                    if(!Storage::disk('public')->exists('building/gallery')){
                        Storage::disk('public')->makeDirectory('building/gallery');
                    }
                    $buildingimage = Image::make($images)->save($galimage['name']);
                    Storage::disk('public')->put('building/gallery/'.$galimage['name'], $buildingimage);

                    $building->gallery()->create($galimage);
                }
            }
        }

        Toastr::success('message', 'Building updated successfully.');
        return redirect()->route('admin.building.index');
    }

    public function destroy(Building $building)
    {
        $building = Building::find($building->id);

        if(Storage::disk('public')->exists('building/'.$building->image)){
            Storage::disk('public')->delete('building/'.$building->image);
        }
        if(Storage::disk('public')->exists('building/'.$building->floor_plan)){
            Storage::disk('public')->delete('building/'.$building->floor_plan);
        }

        $building->delete();
        
        $galleries = $building->gallery;
        if($galleries)
        {
            foreach ($galleries as $key => $gallery) {
                if(Storage::disk('public')->exists('building/gallery/'.$gallery->name)){
                    Storage::disk('public')->delete('building/gallery/'.$gallery->name);
                }
                BuildingImageGallery::destroy($gallery->id);
            }
        }

        $building->features()->detach();
        $building->comments()->delete();

        $house_del = DB::table('houses')->where('building', $building->id)->get();

        foreach ($house_del as $key => $value) {

            $house = DB::table('houses')->where('id', $value->id)->get();
            $house_gallery = DB::table('house_image_galleries')->where('house_id', $value->id)->get();
            $bookings = DB::table('messages')->where('house_id', $value->id)->get();
            $billings = DB::table('billings')->where('house_id', $value->id)->get();


            DB::table('houses')->where('id', $value->id)->delete();
            
            if($house_gallery)
            {
                foreach ($house_gallery as $key => $gallery) {
                    if(Storage::disk('public')->exists('house/gallery/'.$gallery->name)){
                        Storage::disk('public')->delete('house/gallery/'.$gallery->name);
                    }
                    DB::table('house_image_galleries')->where('id', $gallery->id)->delete();
                }
            }

            if($bookings)
            {
                foreach ($bookings as $key => $value) {
                    DB::table('messages')->where('id', $value->id)->delete();
                }
            }

            if($billings)
            {
                foreach ($billings as $key => $value) {
                    DB::table('billings')->where('id', $value->id)->delete();
                }
            }

        }

        Toastr::success('message', 'Building deleted successfully.');
        return back();
    }


    public function galleryImageDelete(Request $request){
        
        $gallaryimg = BuildingImageGallery::find($request->id)->delete();

        if(Storage::disk('public')->exists('building/gallery/'.$request->image)){
            Storage::disk('public')->delete('building/gallery/'.$request->image);
        }

        if($request->ajax()){

            return response()->json(['msg' => $gallaryimg]);
        }
    }

    // YOUTUBE LINK TO EMBED CODE
    private function convertYoutube($youtubelink, $w = 250, $h = 140) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"$w\" height=\"$h\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allowfullscreen></iframe>",
            $youtubelink
        );
    }
}
