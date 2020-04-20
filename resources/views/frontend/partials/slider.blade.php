<style>
    .carousel {
        height: 80vh;
    }
</style>

<section class="carousel carousel-slider center">
    @if($sliders)
        @foreach($sliders as $slider)
            <div class="carousel-item" style="background-size: 100% 100%; background-image: url({{Storage::url('slider/'.$slider->image)}});background-repeat: no-repeat;" href="#{{$slider->id}}!">
                <div class="slider-content">
                    <h2 class="white-text" style="font-size: 60px; margin-top: 100px; font-family: fantasy; line-height: 55px;">{{ $slider->title }}</h2>
                    <p class="white-text" style="font-size: 25px; margin: 0 auto; width: 60%">{{ $slider->description }}</p>
                </div>
            </div>
        @endforeach
    @else 
        <div class="carousel-item amber indigo-text" style="background-image: url({{ asset('frontend/images/real_estate.jpg') }})" href="#1!">
            <h2>Slider Title goes here</h2>
            <p class="indigo-text">Slider description goes here</p>
        </div>
    @endif
</section>