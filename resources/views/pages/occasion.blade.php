@extends('frontend.layouts.app')

@section('styles')
<style>
    :root {
        --white: #fff;
        --light: #f0eff3;
        --black: #000000;
        --dark-blue: #1f2029;
        --dark-light: #353746;
        --red: #da2c4d;
        --yellow: #f8ab37;
        --grey: #ecedf3;
        --blue:  #0127fd;
        --green:  #10c300;
    }

    /* to view data button */
    .section {
        position: relative;
        width: 100%;
        display: block;
        text-align: center;
        margin: 0 auto;
    }
    .over-hide {
        overflow: hidden;
    }
    .z-bigger {
        z-index: 100 !important;
    }

    /* DEFIND CHECK BUTTON STYLE */
    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked),
    [type="radio"]:checked,
    [type="radio"]:not(:checked){
        position: absolute;
        left: -9999px;
        width: 0;
        height: 0;
        /* visibility: hidden; */
        
    }
    /* DEFIND CHECK BUTTON STYLE */

    /* BUTTON STYLES AND BG COLOR DEFIND */
    .checkbox-tools:checked + label,
    .checkbox-tools:not(:checked) + label{
        position: relative;
        display: inline-block;
        padding: 20px;
        width: 110px;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1px;
        margin: 0 auto;
        margin-left: 5px;
        margin-right: 5px;
        margin-bottom: 10px;
        text-align: center;
        border-radius: 4px;
        overflow: hidden;
        cursor: pointer;
        text-transform: uppercase;
        border-color: var(--black);
        color: var(--black);
        -webkit-transition: all 100ms linear;
        transition: all 100ms linear; 
        border: 2px solid rgb(0, 119, 255);
    }

    .checkbox-tools:not(:checked) + label{
        background-color: var(--white);
        /* box-shadow: 0 2px 4px 0  rgb(0, 0, 0); */
        
        border: 1px solid #eee;
    }
    .checkbox-tools:checked + label{
    
        background-color: transparent !important;
        box-shadow: 0 8px 16px 0 rgba(255, 255, 255, 0.2);
    }
    .checkbox-tools:not(:checked) + label:hover{
    
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    /* BUTTON COLOR CHANGE */
    .checkbox-tools:checked + label::before,
    .checkbox-tools:not(:checked) + label::before{
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        background-image: linear-gradient(298deg, var(--white), var(--white));
        /* background-image: linear-gradient(298deg, var(--red), var(--yellow)); */
        border:2px;
        
        z-index: -1;
    }
















    .checkbox-tools:checked + label .uil,
    .checkbox-tools:not(:checked) + label .uil{
        font-size: 24px;
        line-height: 24px;
        display: block;
        padding-bottom: 10px;
    }

    .checkbox:checked ~ .section .container .row .col-12 .checkbox-tools:not(:checked) + label{
        background-color: var(--light);
        color: var(--dark-blue);
        box-shadow: 0 1x 4px 0 rgba(247, 5, 5, 0.979);
        
    }



    .checkbox-booking:checked + label,
    .checkbox-booking:not(:checked) + label{
        position: relative;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-align-items: center;
        -moz-align-items: center;
        -ms-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        -moz-justify-content: center;
        -ms-justify-content: center;
        justify-content: center;
        -ms-flex-pack: center;
        text-align: center;
        padding: 0;
        padding: 6px 25px;
        font-size: 14px;
        line-height: 30px;
        letter-spacing: 1px;
        margin: 0 auto;
        margin-left: 6px;
        margin-right: 6px;
        margin-bottom: 16px;
        text-align: center;
        border-radius: 4px;
        cursor: pointer;
        /* color: var(--white); */
        /* border: 2px solid black; */
        
        text-transform: uppercase;
        background-color: var(--white);
        -webkit-transition: all 100ms linear;
        transition: all 100ms linear; 
    }

    /*  */
    .checkbox-booking:checked + label::before{
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
    .checkbox-booking:not(:checked) + label:hover::before{
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    /* border color change */
    .checkbox-booking:checked + label::before,
    .checkbox-booking:not(:checked) + label::before{
        position: absolute;
        content: '';
        top: -4px;
        left: -4px;
        width: calc(100% + 8px);
        height: calc(100% + 8px);
        border-radius: 6px;
        z-index: -2;
        /* border: solid  2px #F00; */
        background-image: linear-gradient(50deg, var(--blue), var(--green));
        -webkit-transition: all 100ms linear;
        transition: all 100ms linear; 
    }
    .checkbox-booking:not(:checked) + label::before{
        top: -1px;
        left: -1px;
        width: calc(100% + 2px);
        height: calc(100% + 2px);
    }
    /* border color hidden */
    .checkbox-booking:checked + label::after,
    .checkbox-booking:not(:checked) + label::after{
        position: absolute;
        content: '';
        top: -2px;
        left: -2px;
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        border-radius: 4px;
        z-index: -2;
        background-color: var(--dark-light);
        -webkit-transition: all 100ms linear;
        transition: all 100ms linear; 
    }
    /* border opacity change */
    .checkbox-booking:checked + label::after{
        opacity: 0;
    }
    .checkbox-booking:checked + label .uil,
    .checkbox-booking:not(:checked) + label .uil{
        font-size: 20px;
    }
    /* contant opacity change */
    .checkbox-booking:checked + label .text,
    .checkbox-booking:not(:checked) + label .text{
        position: relative;
        display: inline-block;
        -webkit-transition: opacity 100ms linear;
        transition: opacity 100ms linear;
    } 
    .checkbox-booking:checked + label .text{
        opacity: 0.6;
    }


</style>
@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
  <progress max="22" value="2">
</progress></div>
<div class="container">
            <center>
            <div>
            <p>Good Work<br>Now we will prepare a special package with your tastes </p>
            </div>
        </center>

            <div class="row">
                @for($i=1; $i<=8; $i++)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="custom-control custom-checkbox image-checkbox">
                        <input type="checkbox" id="occasion_{{ $i }}" class="checkbox-booking" name="occasion">
                        <label class="for-checkbox-booking" for="occasion_{{ $i }}">
                            <img src="{{ asset('assets/images/specific/Screenshot_1.jpg') }}" alt="#" class="img-fluid">
                        </label>
                    </div>
                </div>
                @endfor
            </div>

            
  
  
  
  
  </div>
</div>

    <!-- commend -->
    <div class="container">
        <p>Before we pack your boxIs there anything else your stylist should know?</p>
        <form action="/action_page.php">
          <div class="form-group">
             <textarea class="form-control" rows="3" id="comment" name="text"></textarea>
          </div>
        
        </form>
      </div>
    <!-- commend -->


      <div class="container">
        <div class="row">
          <div class="col-sm-6">
      <button type="button" class="btn btn-outline-primary" id="back">GO BACK</button>
      </div>
      <div class="col-sm-6">
            <button type="button" class="btn btn-primary" id="endstep">CONTINU</button></div>
      <a href="{{ route('description.index') }}">go Description</a>
    </div>
    </div>

  </div>
@endsection

@section('scripts')

@endsection