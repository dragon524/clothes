@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
  <progress max="22" value="2">
</progress></div>


<div class="container">
           
           <div class="row">
               <div class="col-md-6">
                   <div class="custom-control custom-checkbox image-checkbox">
                       
                      
                       <img src="{{ asset('assets/images//DUHmslvXcAA8MC8.jpg') }}" alt="#" class="img-fluid">
                       
                    
                   </div>
               </div>
               <div class="col-md-6">
                   <center>
                       <div>
                     <p> Good Work<br>
                           Now we will prepare a special package with your tastes 
                       </div></center>
                   
           
                   <div class="custom-control custom-checkbox image-checkbox">
                      <!-- <label  class="css-label"> -->
                       Our stylists will prepare a package just for you. The office will send us the amount to pay to receive and all the instructions to return the goods you don't like
<!--                        
                      </label> -->
                   </div>
               </div>
              
               
           </div>

           
           
 
 
 </div>
</div>
       <div class="container">
           <div class="row">
           <div class="col-md-3">
                <a class="btn butme dropdown-toggle mr-4" type="image" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false"><img src="{{ asset('assets/images/specific/Screenshot_9.jpg') }}"></a>

               <div class="dropdown-menu">
               
               <p>Our service is free. All items are sold at retail prices and there is no automatic subscription.</p>
              
               </div>
           </div>

          
               <div class="col-md-3">
                    <a class="btn butme dropdown-toggle mr-4" type="image" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><img src="{{ asset('assets/images/specific/Screenshot_10.jpg') }}"></a>
   
                   <div class="dropdown-menu">
                   
                   <p>We deliver to your choice of address and cover all the costs. Track your order online or with our app. There is a prepaid label for your return items inside the box.</p>
                  
                   </div>
               </div>

              
                   <div class="col-md-3">
                        <a class="btn butme dropdown-toggle mr-4" type="image" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><img src="{{ asset('assets/images/specific/Screenshot_11.jpg') }}"></a>
       
                       <div class="dropdown-menu">
                       
                       <p>If you’d like to speak to your stylist about your preferences and box contents, you can schedule a call during checkout.</p>
                      
                       </div>
                   </div>

         
           <div class="col-md-3">
                <a class="btn butme dropdown-toggle mr-4" type="image" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false"><img src="{{ asset('assets/images/specific/Screenshot_12.jpg') }}"></a>

               <div class="dropdown-menu">
               
               <p>Request a preview of your selection during checkout. Your stylist will send you a preview via email. You then have 1 day to tell us if you would like to change any of the items in your order, before we send you your selection.</p>
              
               </div>
           </div>

           
       </div>
   </div>


   <!-- commend -->
  
      
   <!-- commend -->


     <div class="container">
       <div class="row">
         <div class="col-sm-6">
     <button type="button" class="btn btn-outline-primary" id="back">GO BACK</button>
     </div>
     <div class="col-sm-6"><button type="button" class="btn btn-primary" id="complet">CONTINU</button></div>
   </div> 
    <a href="{{ route('userinfo.index') }}">go UserInfo</a>
   </div>

 </div>
@endsection

@section('scripts')
@endsection