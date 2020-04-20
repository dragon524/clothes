@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
  <progress max="22" value="2">
</progress></div>
<div class="container">
  <center>
  <div>
    <p>Good Work<br>
      Now we will prepare a special package with your tastes</p>
  </div></center>
<div class="row mySlidesfade">
    @for($i=1; $i<=9; $i++)
    <div class="col-xs-6 col-sm-4">
        <input type="checkbox" id="choose_{{ $i }}" name="choose" value="">
        <label for="choose_{{ $i }}">
            <img src="{{ asset('assets/images/cloth/1.jpg') }}" alt="#">
            <center><p>Sweatshirts</p></center>
        </label>
    </div>
    @endfor
</div>





</div>




      <div class="container">
        <div class="row">
          <div class="col-sm-6">
      <button type="button" class="btn btn-outline-primary" id="back">GO BACK</button>
      </div>
      <div class="col-sm-6">
          <button type="button" class="btn btn-primary" id="speacy">CONTINU</button></div>
      <a href="{{ route('occasion.index') }}">go Occasion</a>
    </div>
    </div>

  </div>

@endsection

@section('scripts')

@endsection