@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('agent.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">

                    <h4 class="agent-title">DASHBOARD</h4>
                    
                    <div class="agent-content">

                        <div class="row">
                            <div class="col s4">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">apartment</i>
                                    <span class="truncate uppercase bold font-18">Buildings</span>
                                    <h4 class="m-t-10 m-b-0">{{ $buildingtotal }}</h4>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">house</i>
                                    <span class="truncate uppercase bold font-18">Houses</span>
                                    <h4 class="m-t-10 m-b-0">{{ $housetotal }}</h4>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">how_to_reg</i>
                                    <span class="truncate uppercase bold font-18">Bookings</span>
                                    <h4 class="m-t-10 m-b-0">{{ $messagetotal }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s4">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">location_city</i>
                                    <span class="truncate uppercase bold">Recent Buildings</span>
                                </div>
                                <div class="box-content">
                                    @foreach($buildings as $key => $building)
                                    <div class="grey lighten-4">
                                        <a href="{{route('building.show',$building->slug)}}" target="_blank" class="border-bottom display-block p-15  grey-text-d-2">
                                            {{ ++$key }}. {{ str_limit($building->title, 13) }} : 
                                            <span class="right">{{ str_limit($building->address, 18) }}</span>
                                            <!-- <span class="right"><strong>Parking Type : </strong> {{ $building->parking }}</span>
                                            <span class="right"><strong>Parking Price : </strong> &dollar;{{ $building->parking_price }}</span> -->
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col s4">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">location_city</i>
                                    <span class="truncate uppercase bold">Recent Houses</span>
                                </div>
                                <div class="box-content">
                                    @foreach($houses as $key => $house)
                                    <div class="grey lighten-4">
                                        <a href="{{route('house.show',$house->slug)}}" target="_blank" class="border-bottom display-block p-15  grey-text-d-2">
                                            {{ ++$key }}. {{ str_limit($house->title, 20) }}
                                            <span class="right">&dollar;{{ $house->price }}</span>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        
                            <div class="col s4">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">how_to_reg</i>
                                    <span class="truncate uppercase bold">Recent Bookings</span>
                                </div>
                                <div class="box-content">
                                    @foreach($messages as $message)
                                    <div class="grey lighten-4">
                                        <a href="{{ route('agent.message') }}" class="border-bottom display-block p-15 grey-text-d-2">
                                            <strong>{{ strtok($message->name, " ") }}:</strong>
                                            <?php $house = DB::table('houses')->where('id', $message->house_id)->get(); ?>
                                            <span class="p-l-5">{{ str_limit($house[0]->title, 25) }}</span>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection