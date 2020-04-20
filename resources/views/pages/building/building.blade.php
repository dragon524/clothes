@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
<style>
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
</style>

    <section class="section">
        <div class="container">
            
            <div class="row">
                <h4 class="section-heading">Buildings</h4>
            </div>


            <div class="row">

                @foreach($buildings as $building)
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                @if(count($building->gallery) > 0)
                                    @if(Storage::disk('public')->exists('building/gallery/'.$building->gallery[0]->name) && $building->gallery[0]->name)
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('building/gallery/'.$building->gallery[0]->name)}})"></span>
                                    @else
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('building/default.jpg')}})"><span>
                                    @endif
                                @endif
                                
                                @if($building->featured == 1)
                                    <a class="btn-floating halfway-fab waves-effect waves-light indigo"><i class="small material-icons">star</i></a>
                                @endif
                            </div>
                            <div class="card-content building-content">
                                <a href="{{ route('building.show',$building->slug) }}">
                                    <span class="card-title tooltipped" data-position="bottom" data-tooltip="{{ $building->title }}"> {{ str_limit( $building->title, 18 ) }}</span>
                                </a>

                                <div class="address">
                                    <i class="small material-icons left">location_city</i>
                                    <span>{{ ucfirst($building->city) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">place</i>
                                    <span>{{ str_limit($building->address, 40) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">directions_car</i>
                                    <span>&dollar;{{ $building->parking_price }} for {{ ucfirst($building->parking) }} Parking</span>
                                </div>
                              
                            </div>
                            <div class="card-action building-action">
                                <!-- <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    Bedroom: <strong>{{ $building->bedroom}}</strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    Bathroom: <strong>{{ $building->bathroom}}</strong> 
                                </span> -->
                                <span class="btn-flat" style="display: inline-flex;">
                                    <i class="material-icons" style="margin-right: 5px;">square_foot</i>
                                    Area: <strong style="margin: 0px 5px;">{{ $building->area}}</strong> Square Feet
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
        var js_buildings = <?php echo json_encode($buildings);?>;
        js_buildings.data.forEach(element => {
            if(element.rating){
                var elmt = element.rating;
                var sum = 0;
                for( var i = 0; i < elmt.length; i++ ){
                    sum += parseFloat( elmt[i].rating ); 
                }
                var avg = sum/elmt.length;
                if(isNaN(avg) == false){
                    $("#propertyrating-"+element.id).rateYo({
                        rating: avg,
                        starWidth: "20px",
                        readOnly: true
                    });
                }else{
                    $("#propertyrating-"+element.id).rateYo({
                        rating: 0,
                        starWidth: "20px",
                        readOnly: true
                    });
                }
            }
        });
    })
</script>
@endsection