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
                <h4 class="section-heading">Houses</h4>
            </div>


            <div class="row">

            @foreach($houses as $house)
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                @if(count($house->gallery) > 0)
                                    @if(Storage::disk('public')->exists('house/gallery/'.$house->gallery[0]->name) && $house->gallery[0]->name)
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('house/gallery/'.$house->gallery[0]->name)}})"></span>
                                    @else
                                        <span class="card-image-bg" style="background-image:url({{Storage::url('house/default.jpg')}})"><span>
                                    @endif
                                @endif
                            </div>
                            <div class="card-content building-content">
                                <a href="{{ route('house.show',$house->slug) }}">
                                    <span class="card-title tooltipped" data-position="bottom" data-tooltip="{{ $house->title }}">{{ str_limit( $house->title, 18 ) }}<span style="float: right; margin-top: 10px;">&dollar;{{ $house->price }}</span></span>
                                </a>
                                <div class="address">
                                    <i class="small material-icons left">location_city</i>
                                    <?php $building_info = DB::table('buildings')->where('id', $house->building)->get() ?>
                                    <span>{{ ucfirst($building_info[0]->title) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">place</i>
                                    <span>{{ str_limit($building_info[0]->address, 38) }}</span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">people</i>
                                    <span>{{ $house->capacity }} People</span>
                                </div>
                            </div>
                            <div class="card-action building-action">
                                <span class="btn-flat">
                                    <i class="material-icons">local_hotel</i>
                                    Bedroom: <strong>{{ $house->bedroom}}</strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">bathtub</i>
                                    Bathroom: <strong>{{ $house->bathroom}}</strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">square_foot</i>
                                    Area: <strong>{{ $house->area}}</strong> Square Feet
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
        var js_houses = <?php echo json_encode($houses);?>;
        js_houses.data.forEach(element => {
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