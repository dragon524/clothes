@extends('frontend.layouts.app')

@section('styles')
<style>
    .gallery-image{
        width: 33.333%;
        height: 180px;
    }
    .collection-item{
        min-height: auto !important;
        background-color: white !important;
        color: #303f9f;
    }
    .title{
        font-weight: bold;
    }
    .blue-grey.darken-1{
        background-color: white !important;
    }
    .book_state{
        color:#303f9f;
        font-size: 20px;
        text-align:center;
        background-color: red;
        background-color: #03e40c;
        padding: 5px; border-radius: 5px;
    }
    .input-group-append{
        display: none;
    }

    .btn.disabled{
        text-transform: none;
        display: inline-flex;
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
                <div class="col s12 m8">
                    <div class="single-title">
                        <h4 class="single-title" style="display: flex;">{{ $house->title }}
                            @if($house->state==1)
                                <span class="new badge red" data-badge-caption="Booked"></span>
                            @else
                                <span class="new badge green" data-badge-caption="Available"></span>
                            @endif
                        </h4>
                    </div>
                    <?php $building_info = DB::table('buildings')->where('id', $house->building)->get(); ?>
                    <div class="address m-b-30">
                        <i class="small material-icons left" style="margin-top: 7px;">place</i>
                        <span class="font-18">{{ $building_info[0]->address }}</span>
                    </div>

                    <div>
                        <span class="btn btn-small disabled b-r-20"><i class="small material-icons">local_hotel</i> Bedroom: {{ $house->bedroom}} </span>
                        <span class="btn btn-small disabled b-r-20"><i class="small material-icons">bathtub</i> Bathroom: {{ $house->bathroom }}</span>
                        <span class="btn btn-small disabled b-r-20"><i class="small material-icons">square_foot</i> Area: {{ $house->area}} Sq Ft</span>
                        <span class="btn btn-small disabled b-r-20"><i class="small material-icons">people</i> Capacity: {{ $house->capacity}} people</span>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div>
                        <h4 class="center" style="font-family: fantasy; color:#3f51b5;">&dollar;{{ $house->price }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2"></div>
                <div class="col s12 m8">
                    @if(!$house->gallery->isEmpty())
                        <div class="single-slider">
                            @include('pages.house.slider')
                        </div>
                    @else
                        <div class="single-image">
                            @if(Storage::disk('public')->exists('house/'.$house->image) && $house->image)
                                <img src="{{Storage::url('house/'.$house->image)}}" alt="{{$house->title}}" class="imgresponsive">
                            @endif
                        </div>
                    @endif
                    <div class="single-description p-15 m-b-15 border2 border-top-0">
                        <span style="font-weight: bold;">Description : </span> {!! $house->description !!}
                    </div>
                    
                </div>
            </div>
            <div class="row">
            <div class="col s12 m2"></div>
                @if((isset( auth()->user()->role_id )) && ( auth()->user()->role_id == 3 ) && ($house->state==0))
                <div class="col s12 m8">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text" style="min-height:80px; padding: 40px 0px 0px 60px;">
                            <span class="card-title" style="font-weight: bolder; color: #303f9f; float:left;">Booking</span>
                        </div>
                        <div style="padding: 20px;">
                            <form id="contact-us" action="{{route('user.message.send')}}" method="POST">
                                <div class="container" style="width: 90%">
                                    <div class="row">
                                        <div class="col s12 m6">
                                            @csrf
                                            <!-- <input type="hidden" name="mailto" value="{{ $contactsettings[0]['email'] ?? 'p4alam@gmail.com' }}"> -->

                                            @auth
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <?php
                                                    $agent_id = DB::table('buildings')->select('agent_id')->where('id', $house->building)->get();
                                                ?>
                                                <input type="hidden" name="agent_id" value="{{$agent_id[0]->agent_id}}">
                                                <input type="hidden" name="house_id" value="{{$house->id}}">
                                                <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                            @endauth

                                            @auth
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">person</i>
                                                    <input id="name" name="name" type="text" class="validate" value="{{ auth()->user()->name }}" readonly>
                                                    <label for="name">Name</label>
                                                </div>
                                            @endauth
                                            @guest
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">person</i>
                                                    <input id="name" name="name" type="text" class="validate">
                                                    <label for="name">Name</label>
                                                </div>
                                            @endguest

                                            @auth
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">mail</i>
                                                    <input id="email" name="email" type="email" class="validate" value="{{ auth()->user()->email }}" readonly>
                                                    <label for="email">Email</label>
                                                </div>
                                            @endauth
                                            @guest
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">mail</i>
                                                    <input id="email" name="email" type="email" class="validate">
                                                    <label for="email">Email</label>
                                                </div>
                                            @endguest

                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">phone</i>
                                                <input id="phone" name="phone" type="number" class="validate">
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">people</i>
                                                <input id="capacity" name="capacity" type="number" class="validate">
                                                <label for="capacity">People</label>
                                            </div>

                                            <!-- <div class="input-field col s12">
                                                <i class="material-icons prefix">mode_edit</i>
                                                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                                                <label for="message">Message</label>
                                            </div> -->
                                        </div>
                                        <div class="col s12 m6">
                                            <span style="display: inline-flex;"><i class="material-icons prefix" style="margin-right: 10px;">date_range</i>
                                            <span style="font-weight: bold;"> Start Date: </span></span><input id="startDate" name="start_date"/>
                                            <span style="display: inline-flex;"><i class="material-icons prefix" style="margin-right: 10px;">date_range</i>
                                            <span style="font-weight: bold;"> End Date: </span></span><input id="endDate" name="end_date"/>
                                        </div>
                                        <div class="col s12 m12" style="text-align: center">
                                            <button id="msgsubmitbtn" class="btn waves-effect waves-light indigo darken-4 btn-large" type="submit">
                                                <i class="material-icons right">access_time</i>    
                                                <span>Book</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
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

        @if(!$house->gallery->isEmpty())
            jssor_1_slider_init();
        @endif

    </script>
    
@endsection