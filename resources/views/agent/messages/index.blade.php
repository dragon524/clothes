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

                    <h4 class="agent-title">Booking Management</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Building</th>
                                    <th>House</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Price</th>
                                    <th>People</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            @foreach( $messages as $key => $message )
                                    <tr>
                                        <?php 
                                            $house_info = DB:: table('houses')->where('id', $message->house_id)->get();
                                            $building_info = DB:: table('buildings')->where('id', $house_info[0]->building)->get();

                                        ?>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>
                                            <a href="{{ route('building.show', $building_info[0]->slug) }}">
                                                {{ ucfirst(strtok($building_info[0]->title,' ')) }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('house.show', $house_info[0]->slug) }}">
                                                {{ ucfirst(strtok($house_info[0]->title,' ')) }}
                                            </a>
                                        </td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td> &dollar;{{ ucfirst(strtok($house_info[0]->price,' ')) }}</td>
                                        <td>{{ $message->capacity }}</td>
                                        <td>{{date('M d Y', strtotime($message->start_date) )}}</td>
                                        <td>{{date('M d Y', strtotime($message->end_date) )}}</td>
                                        <td>
                                            @if($message->status == 0)
                                                <span class="new badge blue" data-badge-caption="Pending"></span>
                                            @elseif($message->status == 1)
                                                <span class="new badge green" data-badge-caption="Booked"></span>
                                            @elseif($message->status == 2)
                                                <span class="new badge grey" data-badge-caption="Canceled"></span>
                                            @elseif($message->status == 3)
                                                <span class="new badge red" data-badge-caption="Declined"></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($message->status == 0)
                                                <button type="button" style="display: inline-flex;" class="btn btn-small green waves-effect" onclick="acceptMessage({{$message->id}})">
                                                    <i class="material-icons">done</i>Accept
                                                </button>
                                                <form action="{{route('agent.message.accept',$message->id)}}" method="GET" id="apt-booking-{{$message->id}}" style="display:none;">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="hidden" name="house_id" value="{{$message->house_id}}">
                                                </form>
                                            @elseif($message->status == 1)
                                                <button type="button" style="display: inline-flex;" class="btn btn-small red waves-effect" onclick="declineMessage({{$message->id}})">
                                                    <i class="material-icons">delete</i>Decline
                                                </button>
                                                <form action="{{route('agent.message.decline',$message->id)}}" method="GET" id="dcl-booking-{{$message->id}}" style="display:none;">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="hidden" name="house_id" value="{{$message->house_id}}">
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="center">
                            {{ $messages->links() }}
                        </div>
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function acceptMessage(id){
            swal({
            title: 'Are you sure?',
            text: "Booking will be accepted!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, accept it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('apt-booking-'+id).submit();
                    swal(
                    'Accepted!',
                    'Booking has been accepted.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }

        function declineMessage(id){
            swal({
            title: 'Are you sure?',
            text: "Booking will be declined!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, decline it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('dcl-booking-'+id).submit();
                    swal(
                    'Declined!',
                    'Booking has been declined.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }
    </script>
@endsection