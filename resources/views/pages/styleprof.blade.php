@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
    <progress max="100" value="25"></progress>
</div>

<!-- scr -->

<div class="container">
    <form action="{{route('styleprof.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- 1 -->
        <div class="mySlidesfade text-center" id="stylebox_1">
            <h3>What do you like to wear in your free time?</h3>
            <div class="row">
                <input type="hidden" id="hi_fr" name="hi_fr" value=""/>
                @foreach($freestyles as $freestyle)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" id="fs_{{ $freestyle->id }}" name="freestyle" value="{{ $freestyle->id }}"/>
                        <label for="fs_{{ $freestyle->id }}">
                            <img src="{{ Storage::url('freestyle/'.$freestyle->image) }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- 2 -->
        <div class="mySlidesfade text-center" id="stylebox_2">
            <h3>What do you wear to work?</h3>
            <div class="row">
                <input type="hidden" id="hi_ws" name="hi_ws" value=""/>
                @foreach($workstyles as $workstyle)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" id="ws_{{ $workstyle->id }}" name="workstyle" value="{{ $workstyle->id }}" />
                        <label for="ws_{{ $workstyle->id }}">
                            <img src="{{ Storage::url('workstyle/'.$workstyle->image) }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- 3 -->
        <div class="mySlidesfade neverstyle text-center" id="stylebox_3">
            <h3>What would you NEVER wear?</h3>
            <div class="row">
            <input type="hidden" id="hi_ns" name="hi_ns" value=""/>
                @foreach($neverwears as $neverwear)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" id="ns_{{ $neverwear->id }}" name="neverwear" value="{{ $neverwear->id }}" />
                        <label for="ns_{{ $neverwear->id }}">
                            <img src="{{ Storage::url('neverwear/'.$neverwear->image) }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4 -->

        <div class="mySlidesfade text-center" id="stylebox_4">
            <h3>Which brands do you like?</h3>
            <div class="row">
                <input type="hidden" id="hi_br" name="hi_br" value=""/>
                @foreach($brands as $brand)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" id="br_{{ $brand->id }}" name="brand" value="{{ $brand->id }}" />
                        <label for="br_{{ $brand->id }}">
                            <img src="{{ Storage::url('brand/'.$brand->image) }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5 -->
        <div class="mySlidesfade text-center" id="stylebox_5">
            <h3>How old do you feel?</h3>
            <div class="row">
                <input type="hidden" id="hi_age" name="hi_age" value=""/>
                @foreach($ages as $age)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" id="age_{{ $age->id }}" name="age" value="{{ $age->id }}" />
                        <label for="age_{{ $age->id }}">
                            <img src="{{ Storage::url('age/'.$age->image) }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    
        <div class="container text-center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>
        <input type="submit" id="sub_style" hidden/>
    </form>
    <div>
        <button id="backBtn" class="btn btn-outline-primary" onclick="plusSlides(-1)">GO BACK</button>
        <button id="continuBtn" class="btn btn-primary" style="float: right;" onclick="plusSlides(1)">CONTINUE</button>
    </div>
</div>
@endsection

@section('scripts')
    <script>
       	// add slider
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            slideIndex += n;
            if(slideIndex > 5){
                var favor_free = [];
                $.each($("input[name='freestyle']:checked"), function(){
                    favor_free.push($(this).val());
                });
                $('#hi_fr').val(favor_free.join(","));

                var favor_ws = [];
                $.each($("input[name='workstyle']:checked"), function(){
                    favor_ws.push($(this).val());
                });
                $('#hi_ws').val(favor_ws.join(","));

                var favor_ns = [];
                $.each($("input[name='neverwear']:checked"), function(){
                    favor_ns.push($(this).val());
                });
                $('#hi_ns').val(favor_ns.join(","));

                var favor_br = [];
                $.each($("input[name='brand']:checked"), function(){
                    favor_br.push($(this).val());
                });
                $('#hi_br').val(favor_br.join(","));

                var favor_age = [];
                $.each($("input[name='age']:checked"), function(){
                    favor_age.push($(this).val());
                });
                $('#hi_age').val(favor_age.join(","));

                window.localStorage.setItem('fr_val', $('#hi_fr').val() );
                window.localStorage.setItem('ws_val', $('#hi_ws').val() );
                window.localStorage.setItem('ns_val', $('#hi_ns').val() );
                window.localStorage.setItem('br_val', $('#hi_br').val() );
                window.localStorage.setItem('age_val', $('#hi_age').val() );
                
                $('#sub_style').click();
            }else{
                showSlides(slideIndex);
            }
            
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlidesfade");
            var dots = document.getElementsByClassName("dot");
            
            if (n > slides) {slideIndex = 1} 
            if (n < 1) {slideIndex = slides}

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";

            if( slideIndex == 1 )
                $('#backBtn').attr('disabled', 'disabled');
            else
                $('#backBtn').removeAttr('disabled');
        }

        // $('#backBtn').attr('disabled', 'disabled');
        // $('#continuBtn').attr('disabled', 'disabled');

        


        // $('#stylebox_' + slideIndex + ' input[type="checkbox"]').click(function(){
            
            // bCheck = false;
            // $("#stylebox_" + slideIndex + ":checked").each(function() {
            //     alert();
            //     bCheck = true;
            // });
            // if(bCheck)
            //     $('#continuBtn').removeAttr('disabled');
            // else
                // $('#continuBtn').attr('disabled', 'disabled');
        // });

        fr_storage = window.localStorage.getItem('fr_val').split(',');
        for(lp_fr_st in fr_storage){
            $('#fs_' + fr_storage[lp_fr_st]).prop( "checked", true );
        }
        ws_storage = window.localStorage.getItem('ws_val').split(',');
        for(lp_ws_st in ws_storage){
            $('#ws_' + ws_storage[lp_ws_st]).prop( "checked", true );
        }
        ns_storage = window.localStorage.getItem('ns_val').split(',');
        for(lp_ns_st in ns_storage){
            $('#ns_' + ns_storage[lp_ns_st]).prop( "checked", true );
        }
        br_storage = window.localStorage.getItem('br_val').split(',');
        for(lp_br_st in br_storage){
            $('#br_' + br_storage[lp_br_st]).prop( "checked", true );
        }
        age_storage = window.localStorage.getItem('age_val').split(',');
        for(lp_age_st in age_storage){
            $('#age_' + age_storage[lp_age_st]).prop( "checked", true );
        }
    </script>
@endsection