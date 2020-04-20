@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section>
        <div class="container" style="margin-top: 50px; min-height: 400px;">
            <div class="row">
                <div class="col s12 m2"></div>
                <div class="col s12 m8">

                    @foreach($buildings as $building)

                        <div class="card horizontal card-no-shadow border1">
                            <div class="card-image horizontal-bg-image">
                                <span class="card-image-bg" style="background-image:url({{Storage::url('building/gallery/'.$building->gallery[0]->name)}});"></span>
                            </div>
                            <div class="card-stacked">
                                <div class="p-20 property-content">
                                    <span class="card-title search-title" title="{{$building->title}}">
                                        <a href="{{ route('building.show',$building->slug) }}">{{ str_limit($building->title,25) }}</a>
                                    </span>
                                    <h5>
                                        <i class="small material-icons left" style="color: #303f9f; ">place</i>
                                        <span class="font-18">{{ $building->address }}</span>
                                        <small class="right p-r-10">{{ $building->parking }} Parking</small>
                                    </h5>
                                </div>

                                <div class="card-action property-action">
                                    <span class="btn-flat">
                                        <i class="material-icons">location_city</i>
                                        City: <strong>{{ $building->city}}</strong> 
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">pages</i>
                                        Area: <strong>{{ $building->area}}</strong> Sq Ft
                                    </span>
                                    
                                    @if($building->featured == 1)
                                        <span class="right featured-stars">
                                            <i class="material-icons">stars</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach


                    <div class="m-t-30 m-b-60 center">
                        {{ 
                            $buildings->appends([
                                'city'      => Request::get('city'),
                            ])->links() 
                        }}
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection