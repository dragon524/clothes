@extends('frontend.layouts.app')

@section('title', 'Show Building')

@push('styles')


@endpush


@section('content')

<style>
    .gallery-image{
        width: 33.333%;
        height: 180px;
    }
    .collection-item{
        min-height: auto !important;
        background-color: white !important;
        color: #1a237e ;
    }
    .title{
        font-weight: bold;
    }
    .blue-grey.darken-1{
        background-color: white !important;
        color: #1a237e ;
    }

</style>
  <div class="row">
    <div class="col s12 m6">
        @if(!$building->gallery->isEmpty())
            <div class="header" style="padding: 10px 20px;">
                <h5 style="font-weight: bold;color:#303f9f;">Gallery Image</h5>
            </div>
            <div class="body">
                <div class="card">
                    <div class="col s12 m12" style="margin-bottom: 30px;">
                        @foreach($building->gallery as $gallery)
                        <div class="col s12 m4">
                            <div>
                                <img class="materialboxed" style="width: 100%; height:150px; border: 3px solid #cecece; border-radius: 5px;"  src="{{Storage::url('building/gallery/'.$gallery->name)}}" alt="{{$building->title}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($building->floor_plan && $building->floor_plan != 'default.png')
            <div class="header" style="padding: 10px 20px;">
                <h5 style="font-weight: bold;color:#303f9f;">Floor Plan</h5>
            </div>
            <div class="card" style="padding: 20px;">
                <div class="body">
                    <img class="materialboxed" style="width: 100%; max-height:400px;" src="{{Storage::url('building/'.$building->floor_plan)}}" alt="{{$building->title}}">
                </div>
            </div>
        @endif

        @if($building->image && $building->image != 'default.png')
            <div class="header" style="padding: 10px 20px;">
                <h5 style="font-weight: bold; color:#303f9f;">Featured Image</h5>
            </div>
            <div class="card" style="padding: 20px;">
                <div class="body">
                    <img class="materialboxed" style="width: 100%; max-height:400px;" src="{{Storage::url('building/'.$building->image)}}" alt="{{$building->title}}">
                </div>
            </div>
        @endif

    </div>
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title" style="font-weight: bolder; color: #303f9f;">About Building</span>
                <ul class="collection">
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">account_balance</i>
                    <span class="title">Title : </span>
                    <p>{{$building->title}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">apartment</i>
                    <span class="title">City : </span>
                    <p>{{$building->city}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle red">place</i>
                    <span class="title">Address : </span>
                    <p>{{$building->address}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">map</i>
                    <span class="title">Near by : </span>
                    <p>{!!$building->nearby!!}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">directions_car</i>
                    <span class="title">Parking Type : </span>
                    <p>{{$building->parking}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle red">attach_money</i>
                    <span class="title">Parking Price : </span>
                    <p>&dollar;{{$building->parking_price}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">library_books</i>
                    <span class="title">Description : </span>
                    <p>{!!$building->description!!}</p>
                    </li>
                </ul>
            </div>
            <div class="card-action" style="text-align: right; font-weight: bolder;">
                <a href="#" style="color: black; font-weight:normal">Posted on {{$building->created_at->toFormattedDateString()}}</a>
                <a href="{{ route('agent.building.index') }}">back</a>
            </div>
        </div>
    </div>
  </div>

 


@endsection

@push('scripts')

    <script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script>
    <script src="{{ asset('backend/plugins/gmaps/gmaps.js') }}"></script>

    <script>

        //Markers
        var markers = new GMaps({
            div: '#gmap_markers',
            lat: '<?php echo $building->location_latitude; ?>',
            lng: '<?php echo $building->location_longitude; ?>'
        });
        markers.addMarker({
            lat: '<?php echo $building->location_latitude; ?>',
            lng: '<?php echo $building->location_longitude; ?>',
            title: '<?php echo $building->title; ?>',
        });

        
    </script>


@endpush
