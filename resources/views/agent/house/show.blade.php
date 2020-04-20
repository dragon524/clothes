@extends('frontend.layouts.app')

@section('title', 'Show House')

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
        color: #303f9f;
    }
    .title{
        font-weight: bold;
    }
    .blue-grey.darken-1{
        background-color: white !important;
    }
    .book_state{
        color:white;
        font-size: 20px;
        text-align:center;
        background-color: #303f9f;
        padding: 5px; border-radius: 5px;
    }
    .input-group-append{
        display: none;
    }
</style>
  <div class="row">
    <div class="col s12 m4">
        @if(!$house->gallery->isEmpty())
                <div class="card-content white-text" style="margin: 10px;">
                    <span class="card-title" style="font-weight: bolder; color: #303f9f; font-size:20px; margin:20px; line-height:80px;">Gallery Image</span>
                    <div class="card-body">
                        <div class="col s12 m12" style="margin-bottom: 30px;">
                            @foreach($house->gallery as $gallery)
                            <div class="col s12 m6">
                                <div>
                                    <img class="materialboxed" style="width: 100%; height:150px; border: 3px solid #cecece; border-radius: 5px;"  src="{{Storage::url('house/gallery/'.$gallery->name)}}" alt="{{$house->title}}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        @endif
    </div>
    <div class="col s12 m4">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title" style="font-weight: bolder; color: #303f9f;">About House</span>
                <ul class="collection">
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">account_balance</i>
                    <span class="title">Title : </span>
                    <p>{{$house->title}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">apartment</i>
                    <span class="title">Belonging building : </span>
                    <?php
                        $building = DB::table('buildings')->select('title', 'address')->where('id', $house->building)->get();
                    ?>
                    <p>{{$building[0]->title}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle red">place</i>
                    <span class="title">Address : </span>
                    <p>{{$building[0]->address}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">person</i>
                    <span class="title">Capacity : </span>
                    <p>{{$house->capacity}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">square_foot</i>
                    <span class="title">Area : </span>
                    <p>{{$house->area}} <span> ft<sup>2</sup></span></p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle">local_hotel</i>
                    <span class="title">Bedroom : </span>
                    <p>{{$house->bedroom}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">bathtub</i>
                    <span class="title">Bathroom : </span>
                    <p>{{$house->bathroom}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle red">attach_money</i>
                    <span class="title">Price : </span>
                    <p>&dollar; {{$house->price}}</p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">library_books</i>
                    <span class="title">Description : </span>
                    <p>{!!$house->description!!}</p>
                    </li>
                </ul>
            </div>
            <div class="card-action" style="text-align: right; font-weight: bolder;">
                <a href="#" style="color: #303f9f; font-size:12px;">Posted on {{$house->created_at->toFormattedDateString()}}</a>
                <a href="{{ route('agent.building.index') }}">back</a>
            </div>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="min-height:80px; display: inline-flex;">
                <span class="card-title" style="font-weight: bolder; color: #303f9f; float:left;">Booking State</span>
                @if($house->state==1)
                    <span class="new badge red" data-badge-caption="Booked"></span>
                @else
                    <span class="new badge green" data-badge-caption="Available"></span>
                @endif
            </div>
            <div style="padding: 20px;">
                @if($house->state==1)
                    <?php 
                        $booking_info = DB::table('messages')->where('house_id', $house->id)->where('status', 1)->get();

                        $message = DB::table('houses')->join('messages', 'messages.house_id', '=', 'houses.id')->select('messages.id','messages.house_id')->where('houses.state', 1)->where('messages.status', 1)->get();
                    ?>
                    <p class="book_state"><span style="font-weight: bold;">{{date('M d, Y', strtotime($booking_info[0]->start_date) )}}  ~ {{date('M d, Y', strtotime($booking_info[0]->end_date) )}} </span> Booked by <span style="font-weight: bold;">{{$booking_info[0]->name}}</span></p>

                    <button type="button" style="display: inline-flex;" class="btn btn-small red waves-effect" onclick="declineMessage({{$message[0]->id}})">
                        <i class="material-icons">delete</i>Decline
                    </button>
                    <form action="{{route('agent.message.decline',$message[0]->id)}}" method="GET" id="dcl-booking-{{$message[0]->id}}" style="display:none;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="house_id" value="{{$message[0]->house_id}}">
                    </form>
                @endif
            </div>
        </div>
    </div>
  </div>


@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

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