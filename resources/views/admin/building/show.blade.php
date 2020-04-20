@extends('backend.layouts.app')

@section('title', 'Show Building')

@push('styles')


@endpush


@section('content')
<style>
    .gallery-image{
        width: 33.333%;
        height: 180px;
    }
</style>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>BUILDING INFO</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$building->title}}
                        <br>
                        <small>Posted<strong> on {{$building->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="left">{{$building->city}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="left">{{$building->address}}</span>
                        </li>
                        @if($building->nearby)
                            <li class="list-group-item">
                                <strong>Near by : </strong>
                                <span class="left">{{strip_tags($building->nearby)}}</span>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <strong>Area : </strong>
                            <span class="right">{{$building->area}} <label style="opacity: 0.7">ft<sup>2</sup></label></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Description : </strong>
                            <span class="left">{!!$building->description!!}</span>
                        </li>
                    </ul>
                </div>
            </div> 
            <div class="card">
                <div class="header">
                    <h2>MAP</h2>
                </div>
                <div class="body">
                    <div id="gmap_markers" class="gmap"></div>
                </div>
            </div>

            @if($building->floor_plan && $building->floor_plan != 'default.png')
            <div class="card">
                <div class="header">
                    <h2>FLOOR PLAN</h2>
                </div>
                @if($building->floor_plan && $building->floor_plan != 'default.png')
                <div class="body">
                    <img class="img-responsive" src="{{Storage::url('building/'.$building->floor_plan)}}" alt="{{$building->title}}" style="width:100%;">
                </div>
                @endif
            </div>
            @endif

            @if($videoembed)
            <div class="card">
                <div class="header">
                    <h2>BUILDING VIDEO</h2>
                </div>
                <div class="body text-center">
                    {!! $videoembed !!}
                </div>
            </div>
            @endif

            @if(!$building->gallery->isEmpty())
            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box">
                        @foreach($building->gallery as $gallery)
                        <div class="gallery-image">
                            <img class="img-responsive" src="{{Storage::url('building/gallery/'.$gallery->name)}}" alt="{{$building->title}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- COMMENTS --}}
            @if(!$building->comments->isEmpty())
                <div class="card">
                    <div class="header">
                        <h2>{{ $building->comments_count }} COMMENTS</h2>
                    </div>
                    <div class="body">

                        @foreach($building->comments as $comment)
                        
                            @if($comment->parent_id == NULL)
                                <div class="comment">
                                    <div class="author-image">
                                        <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                    </div>
                                    <div class="content">
                                        <div class="author-name">
                                            <strong>{{ $comment->users->name }}</strong>
                                            <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="author-comment">
                                            {{ $comment->body }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach($comment->children as $comment)
                                <div class="comment children">
                                    <div class="author-image">
                                        <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                    </div>
                                    <div class="content">
                                        <div class="author-name">
                                            <strong>{{ $comment->users->name }}</strong>
                                            <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="author-comment">
                                            {{ $comment->body }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endforeach
                        
                    </div>
                </div>
            @endif

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>PARKING</h2>
                </div>
                <div class="body">
                    <label>Parking Type : </label> <strong class="label bg-red" style="font-size: 12px;">{{$building->parking}}</strong><br>
                    <label>Parking Price : </label> <strong class="label bg-blue" style="font-size: 12px;">&dollar;{{$building->parking_price}}</strong>
                </div>
            </div>

            <!-- <div class="card">
                <div class="header bg-green">
                    <h2>FEATURES</h2>
                </div>
                <div class="body">
                    @foreach($building->features as $feature)
                        <span class="label bg-green">{{$feature->name}}</span>
                    @endforeach
                </div>
            </div> -->

            @if($building->image && $building->image != 'default.png' && $building->featured == true)
                <div class="card">
                    <div class="header bg-amber">
                        <h2>FEATURED INFO</h2>
                    </div>
                    <div class="body" style=" text-align: center;">
                        @if($building->image && $building->image != 'default.png')
                            <img class="img-responsive thumbnail" src="{{Storage::url('building/'.$building->image)}}" alt="{{$building->title}}">
                        @endif
                        @if($building->featured == true)
                            <span class="badge bg-indigo" style="font-size: 18px;"><i class="material-icons small">star</i> Featured Building</span>
                        @endif
                    </div>
                </div>
            @endif
            
            <div class="form-group" style="text-align:center">
                <a href="{{route('admin.building.index')}}" class="btn btn-danger btn-lg waves-effect">
                    <i class="material-icons left">arrow_back</i>
                    <span>BACK</span>
                </a>
                <a href="{{route('admin.building.edit',$building->slug)}}" class="btn btn-info btn-lg waves-effect">
                    <i class="material-icons">edit</i>
                    <span>EDIT</span>
                </a>
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
