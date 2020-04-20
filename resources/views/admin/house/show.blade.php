@extends('backend.layouts.app')

@section('title', 'Show House')

@push('styles')


@endpush


@section('content')
<style>
    .gallery-image{
        width: 33.3%;
    }
    .gallery-image img{
        height:180px;
    }
</style>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW HOUSE</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$house->title}}
                        <br>
                        <small>Posted on {{$house->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Building : </strong>
                            <?php
                                $building = DB::table('buildings')->select('title')->where('id', $house->building)->get();
                            ?>
                            <span class="right">{{$building[0]->title}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Price : </strong>
                            <span class="right"><label>&dollar;</lable> {{$house->price}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Area : </strong>
                            <span class="right">{{$house->area}} <label style="opacity: 0.7">ft<sup>2</sup></label></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Capacity : </strong>
                            <span class="right">{{$house->capacity}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bedroom : </strong>
                            <span class="right">{{$house->bedroom}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bathroom : </strong>
                            <span class="right">{{$house->bathroom}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Description : </strong>
                            <span class="left">{!!$house->description!!}</span>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <h5>Description</h5>
                    {!!$house->description!!}
                </div>

            </div> 

    
            @if(!$house->gallery->isEmpty())
                <div class="card">
                    <div class="header bg-red">
                        <h2>GALLERY IMAGE</h2>
                    </div>
                    <div class="body">
                        <div class="gallery-box">
                            @foreach($house->gallery as $gallery)
                            <div class="gallery-image">
                                <img class="img-responsive" src="{{Storage::url('house/gallery/'.$gallery->name)}}" alt="{{$house->title}}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="form-group" style="text-align: center;">
                <a href="{{route('admin.house.index')}}" class="btn btn-danger btn-lg waves-effect">
                    <i class="material-icons left">arrow_back</i>
                    <span>BACK</span>
                </a>
                <a href="{{route('admin.house.edit',$house->slug)}}" class="btn btn-info btn-lg waves-effect">
                    <i class="material-icons">edit</i>
                    <span>EDIT</span>
                </a>
            </div>
        </div>

    </div>


@endsection

