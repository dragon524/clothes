<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\House;
use App\Feature;
use App\HouseImageGallery;
use App\Comment;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class HouseController extends Controller
{

    public function index()
    {
        $houses = House::latest()->withCount('comments')->get();

        return view('admin.house.index',compact('houses'));
    }


    public function create()
    {   
        $features = Feature::all();

        return view('admin.house.create',compact('features'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:properties|max:255',
            'price'     => 'required',
            'capacity'      => 'required',
            'bedroom'   => 'required',
            'bathroom'   => 'required',
            'building'   => 'required',
            'area'  => 'required',
            'gallaryimage'     => 'required',
            'description'        => 'required',
        ]);

        $slug  = str_slug($request->title);

        $house = new House();
        $house->title    = $request->title;
        $house->slug     = $slug;
        $house->price    = $request->price;
        $house->area    = $request->area;
        $house->capacity  = $request->capacity;
        $house->bedroom     = $request->bedroom;
        $house->bathroom     = $request->bathroom;
        $house->building    = $request->building;
        $house->description  = $request->description;
        $house->save();

        $gallary = $request->file('gallaryimage');

        if($gallary)
        {
            foreach($gallary as $images)
            {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['house_id'] = $house->id;
                
                if(!Storage::disk('public')->exists('house/gallery')){
                    Storage::disk('public')->makeDirectory('house/gallery');
                }
                $houseimage = Image::make($images)->save($galimage['name']);
                Storage::disk('public')->put('house/gallery/'.$galimage['name'], $houseimage);

                $house->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'House created successfully.');
        return redirect()->route('admin.house.index');
    }


    public function show(House $house)
    {
        $house = House::withCount('comments')->find($house->id);

        return view('admin.house.show',compact('house'));
    }


    public function edit(House $house)
    {
        $features = Feature::all();
        $house = House::find($house->id);

        return view('admin.house.edit',compact('house'));
    }


    public function update(Request $request, $house)
    {
        $request->validate([
            'title'     => 'required|unique:properties|max:255',
            'price'     => 'required',
            'capacity'      => 'required',
            'bedroom'   => 'required',
            'bathroom'   => 'required',
            'building'   => 'required',
            'area'  => 'required',
            'GallaryImage'     => 'required',
            'description'        => 'required',
        ]);

        $slug  = str_slug($request->title);

        $house = House::find($house->id);

        $house->title    = $request->title;
        $house->slug     = $slug;
        $house->price    = $request->price;
        $house->area    = $request->area;
        $house->capacity  = $request->capacity;
        $house->bedroom     = $request->bedroom;
        $house->bathroom     = $request->bathroom;
        $house->building    = $request->building;
        $house->description  = $request->description;
        $house->save();

        $gallary = $request->file('gallaryimage');
        if($gallary){
            foreach($gallary as $images){
                if(isset($images))
                {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                    $galimage['size'] = $images->getClientSize();
                    $galimage['house_id'] = $house->id;
                    
                    if(!Storage::disk('public')->exists('house/gallery')){
                        Storage::disk('public')->makeDirectory('house/gallery');
                    }
                    $houseimage = Image::make($images)->save($galimage['name']);
                    Storage::disk('public')->put('house/gallery/'.$galimage['name'], $houseimage);

                    $house->gallery()->create($galimage);
                }
            }
        }

        Toastr::success('message', 'House updated successfully.');
        return redirect()->route('admin.house.index');
    }

 
    public function destroy(House $house)
    {
        $house = House::find($house->id);

        if(Storage::disk('public')->exists('house/'.$house->image)){
            Storage::disk('public')->delete('house/'.$house->image);
        }
        if(Storage::disk('public')->exists('house/'.$house->floor_plan)){
            Storage::disk('public')->delete('house/'.$house->floor_plan);
        }

        $house->delete();
        
        $galleries = $house->gallery;
        if($galleries)
        {
            foreach ($galleries as $key => $gallery) {
                if(Storage::disk('public')->exists('house/gallery/'.$gallery->name)){
                    Storage::disk('public')->delete('house/gallery/'.$gallery->name);
                }
                HouseImageGallery::destroy($gallery->id);
            }
        }

        $house->comments()->delete();

        $bookings = DB::table('messages')->where('house_id', $house->id)->get();
        $billings = DB::table('billings')->where('house_id', $house->id)->get();

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

        Toastr::success('message', 'House deleted successfully.');
        return back();
    }


    public function galleryImageDelete(Request $request){
        
        $gallaryimg = HouseImageGallery::find($request->id)->delete();

        if(Storage::disk('public')->exists('house/gallery/'.$request->image)){
            Storage::disk('public')->delete('house/gallery/'.$request->image);
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
