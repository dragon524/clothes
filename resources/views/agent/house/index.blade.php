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

                    <h4 class="agent-title">MY HOUSE LIST</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Capacity</th>
                                    <th>Area(<span> ft<sup>2</sup></span>)</th>
                                    <th>Bedroom</th>
                                    <th>Bathroom</th>
                                    <th>Price(&dollar;)</th>
                                    <th>Description</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach( $houses as $key => $house )
                                    <tr>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="{{$house->title}}">
                                                {{ str_limit($house->title,30) }}
                                            </span>
                                        </td>
                                        <td class="center">{{ $house->capacity }}</td>
                                        <td class="center">{{ $house->area }}</td>
                                        <td class="center">{{ $house->bedroom }}</td>
                                        <td class="center">{{ $house->bathroom }}</td>
                                        <td class="center">{{ $house->price }}</td>
                                        <td>{!! str_limit($house->description, 40) !!}</td>
                                        @if($house->state==1)
                                            <td><span class="new badge red" data-badge-caption="Booked"></span></td>
                                        @else
                                            <td><span class="new badge" data-badge-caption="Available"></span></td>
                                        @endif
                                        <td class="center">
                                            <a href="{{route('agent.house.show',$house->slug)}}" target="_blank" class="btn btn-small green waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <form action="{{route('agent.house.destroy',$house->slug)}}" method="POST" id="del-house-{{$house->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
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
    <script>
        function deleteHouse(id){
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, delete it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-house-'+id).submit();
                    swal(
                    'Deleted!',
                    'House has been deleted.',
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