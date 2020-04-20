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

                    <h4 class="agent-title">MY BUILDING LIST</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Parking Type</th>
                                    <th class="center"><i class="material-icons small-star p-t-10">stars</i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach( $buildings as $key => $building )
                                    <tr>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="{{$building->title}}">
                                                {{ str_limit($building->title,20) }}
                                            </span>
                                        </td>
                                        
                                        <td>{{ str_limit($building->address, 35) }}</td>
                                        <td>{{ ucfirst($building->city) }}</td>

                                        <td class="center">{{ $building->parking }}</td>

                                        <td class="center">
                                            @if($building->featured == true)
                                                <span class="indigo-text"><i class="material-icons small-star">stars</i>Featured</span>
                                            @endif
                                        </td>
    
                                        <td class="center">
                                            <a href="{{route('agent.building.show',$building->slug)}}" target="_blank" class="btn btn-small green waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <form action="{{route('agent.building.destroy',$building->slug)}}" method="POST" id="del-building-{{$building->id}}" style="display:none;">
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
        function deleteProperty(id){
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, delete it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-building-'+id).submit();
                    swal(
                    'Deleted!',
                    'Building has been deleted.',
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