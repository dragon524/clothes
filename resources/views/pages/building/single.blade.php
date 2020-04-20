@extends('frontend.layouts.app')

@section('styles')
<style>
    .btn.disabled{
    text-transform: none;
    margin-bottom: 5px;
    }
     .address{
     line-height: 2.5;
     color: #3f51b5;
    }
    .card .card-content{
        padding: 15px 35px;
    }
    .card .card-action{
        padding: 5px 30px;
    }
    .btn-flat i{
        vertical-align: middle;
        color: #3f51b5;
    }
    .address span{
        font-weight: bold;
        color: #747579;
    }
    .card .card-content .card-title{
        font-weight: bold;
        color: #3f51b5;
    }
    .card .card-content .card-title:first-letter {
        text-transform: uppercase;
    }
    #map {
        height: 320px;
    }

    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .jssora106 {display:block;position:absolute;cursor:pointer;}
    .jssora106 .c {fill:#fff;opacity:.3;}
    .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
    .jssora106:hover .c {opacity:.5;}
    .jssora106:hover .a {opacity:.8;}
    .jssora106.jssora106dn .c {opacity:.2;}
    .jssora106.jssora106dn .a {opacity:1;}
    .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

    .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
    .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;box-sizing:border-box;z-index:1;}
    .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
    .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
    .jssort101 .p:hover{padding:2px;}
    .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
    .jssort101 .p:hover.pdn{padding:0;}
    .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
    .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
    .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
    .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
    .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
</style>

@endsection

@section('content')

    <!-- SINGLE PROPERTY SECTION -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <div class="single-title">
                        <h4 class="single-title">{{ $building->title }}</h4>
                    </div>

                    <div class="address m-b-30">
                        <i class="small material-icons left" style="margin-top: 7px;">place</i>
                        <span class="font-18">{{ $building->address }}</span>
                    </div>

                    <div>
                        @if($building->featured == 1)
                            <a class="btn-floating btn-small disabled"><i class="material-icons">star</i></a>
                        @endif

                        <span class="btn btn-small disabled b-r-20">City: {{ $building->city}} </span>
                        <span class="btn btn-small disabled b-r-20">Parking:  &dollar;{{ $building->parking_price }} for {{ $building->parking }} </span>
                        <span class="btn btn-small disabled b-r-20">Area: {{ $building->area}} Sq Ft</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2"></div>
                <div class="col s12 m8">

                    @if(!$building->gallery->isEmpty())
                        <div class="single-slider">
                            @include('pages.building.slider')
                        </div>
                    @else
                        <div class="single-image">
                            @if(Storage::disk('public')->exists('building/'.$building->image) && $building->image)
                                <img src="{{Storage::url('building/'.$building->image)}}" alt="{{$building->title}}" class="imgresponsive">
                            @endif
                        </div>
                    @endif

                    <div class="single-description p-15 m-b-15 border2 border-top-0">
                        <span style="font-weight: bold;">Description : </span> {!! $building->description !!}
                    </div>

                    @if(!($building->floor_plan=='default.png'))
                        <div class="card-no-box-shadow card">
                            <div class="p-15 grey lighten-4">
                                <h5 class="m-0">Floor Plan</h5>
                            </div>
                            <div class="card-image">
                                @if(Storage::disk('public')->exists('building/'.$building->floor_plan) && $building->floor_plan)
                                    <img src="{{Storage::url('building/'.$building->floor_plan)}}" style="max-height: 400px;" alt="{{$building->title}}" class="imgresponsive">
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">Location</h5>
                        </div>
                        <div class="card-image">
                            <div id="map"></div>
                        </div>
                    </div> -->

                    @if($videoembed)
                        <div class="card-no-box-shadow card">
                            <div class="p-15 grey lighten-4">
                                <h5 class="m-0">Video</h5>
                            </div>
                            <div class="card-image center m-t-10">
                                {!! $videoembed !!}
                            </div>
                        </div>
                    @endif

                    <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">Near By</h5>
                        </div>
                        <div class="single-narebay p-15">
                            {!! $building->nearby !!}
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                @foreach($houses as $house)
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                @if(count($house->gallery) > 0)
                                    @if(Storage::disk('public')->exists('house/gallery/'.$house->gallery[0]->name) && $house->gallery[0]->name)
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('house/gallery/'.$house->gallery[0]->name)}})"></span>
                                    @else
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('house/default.jpg')}})"><span>
                                    @endif
                                @endif
                            </div>
                            <div class="card-content building-content">
                                <a href="{{ route('house.show',$house->slug) }}">
                                    <span class="card-title tooltipped" data-position="bottom" data-tooltip="{{ $house->title }}">{{ str_limit( $house->title, 18 ) }}</span>
                                </a>
                                <div class="address">
                                    <i class="small material-icons left">location_city</i>
                                    <?php $building_info = DB::table('buildings')->where('id', $house->building)->get(); ?>
                                    <span>{{ ucfirst($building_info[0]->title) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">place</i>
                                    <span>{{ ucfirst($building_info[0]->address) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">people</i>
                                    <span>{{ $house->capacity }} People</span>
                                </div>
                                <h5 style="text-align: right; font-weight:bold;">
                                    <span>&dollar;{{ $house->price }}</span>
                                </h5>
                            </div>
                            <div class="card-action building-action">
                                <span class="btn-flat">
                                    <i class="material-icons">local_hotel</i>
                                    Bedroom: <strong>{{ $house->bedroom}}</strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">bathtub</i>
                                    Bathroom: <strong>{{ $house->bathroom}}</strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">square_foot</i>
                                    Area: <strong>{{ $building->area}}</strong> Square Feet
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection

@section('scripts')

    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
        })
    </script>

    <script src="{{ asset('frontend/js/jssor.slider.min.js') }}"></script>
    <script>
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
            {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $SpacingX: 5,
                $SpacingY: 5
            }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

        @if(!$building->gallery->isEmpty())
            jssor_1_slider_init();
        @endif

    </script>
    <script>
        function initMap() {
            var propLatLng = {
                lat: <?php echo $building->location_latitude; ?>,
                lng: <?php echo $building->location_longitude; ?>
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: propLatLng
            });

            var marker = new google.maps.Marker({
                position: propLatLng,
                map: map,
                title: '<?php echo $building->title; ?>'
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRLaJEjRudGCuEi1_pqC4n3hpVHIyJJZA&callback=initMap">
    </script>
@endsection