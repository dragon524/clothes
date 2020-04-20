@extends('frontend.layouts.app')

@section('styles')
<style>
  .main{
      background-color: #fff;
  }
  .range-wrap {
    position: relative;
    margin: 0 auto 3rem;
    }
    .range {
    width: 100%;
    }
    .bubble {
    background: #450000 ;
    color: white;
    padding: 4px 12px;
    position: absolute;
    border-radius: 4px;
    left: 50%;
    transform: translateX(-50%);
    }
    .bubble::after {
    content: "";
    position: absolute;
    width: 2px;
    height: 2px;
    background: red;
    top: -1px;
    left: 50%;
    }

</style>
@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
  <progress max="22" value="2">
</progress></div>

<div class="container" style="background-color:#eff2f3; padding:50px; margin-top:100px;">
    <h2>How much do you normally pay?</h2>
    <div class="range-wrap">            
        <label for="usr"><img src="images/icon/Screenshot_3.jpg">Shirts</label>
        <input type="range" class="range" value="96" min="40" max="100"> 
        <output class="bubble"></output>
    </div>
      <div class="range-wrap" style="width: 100%;">
        <label for="usr"><img src="images/icon/Screenshot_5.jpg">Jeans</label>
       
        <input type="range" class="range" min="80" max="150" value="130" step="2">
        <output class="bubble"></output>
      </div>
      <div class="range-wrap" style="width: 100%;">
        <label for="usr"><img src="images/icon/Screenshot_19.jpg">Blazers</label>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
        <input type="range" class="range" min="100" max="350" value="220">       
        <output class="bubble"></output>
      </div>

      <div class="range-wrap" style="width: 100%;">
        <label for="usr"><img src="images/icon/Screenshot_6.jpg">Shoes</label>
       
        <input type="range" class="range" min="80" max="180" value="130">
        <output class="bubble"></output>
      </div></div>

      <div class="container">
        <div class="row">
          <div class="col-sm-6">
      <button type="button" class="btn btn-outline-primary" id="back">GO BACK</button>
      </div>
      <div class="col-sm-6">
      <button type="button" class="btn btn-primary" id="outfite" >CONTINU</button></div>
      <a href="{{ route('choosespecial.index') }}">go Choose</a>
    </div>
     </div>

  </div>

@endsection

@section('scripts')
  <script src="{{ asset('assets/js/rang.js') }}"></script>
   <script>
        $("#back").click(function(event) {
            history.go(-1);
        });
        $("#outfite").click(function(){
          alert();
            window.location "{{ route('choosespecial.index') }}";
        });
   </script>

@endsection