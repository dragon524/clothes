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

                    <h4 class="agent-title">Billing Management</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Building</th>
                                    <th>House</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            @foreach( $messages as $key => $message )
                                @if($message->status == 1)
                                    <tr>
                                        <?php 
                                            $house_info = DB:: table('houses')->where('id', $message->house_id)->get();
                                            $building_info = DB:: table('buildings')->where('id', $house_info[0]->building)->get();

                                        ?>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
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

                                        <td>{{date('M d, Y', strtotime($message->start_date) )}}</td>
                                        <td>{{date('M d, Y', strtotime($message->end_date) )}}</td>

                                        <td>
                                            <a href="{{route('agent.message.billing_view',$message->id)}}" style="display: inline-flex;" class="btn btn-small blue waves-effect">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection