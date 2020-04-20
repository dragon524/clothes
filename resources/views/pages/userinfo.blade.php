@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
    
<div class="ott-progress ng-scope" ng-if="progressbarType === 'test' &amp;&amp; showProgressBar() &amp;&amp; categories" categories="categories" style="">
    <progress max="100" value="25"></progress>
</div>
<div class="container">
           
           <div class="row">
               <div class="col-md-6">
                   <form  action="action.html" class="was-validated">
                       <div class="custom-control custom-switch">
                           <input type="checkbox" class="custom-control-input" id="switch1" name="example">
                           <label class="custom-control-label" for="switch1">Use billing address</label>
                         </div>

                         <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                           <label class="custom-control-label" for="customRadio">Mr.</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                           <label class="custom-control-label" for="customRadio2"> Miss</label>
                         </div>
                       <div class="input-group mb-3">
                           
                         <div class="input-group-prepend">
                           <span class="input-group-text">Name</span>
                         </div>
                         <input type="text" class="form-control" placeholder="First Name" name="ufirstname" required>
                         <input type="text" class="form-control" placeholder="Last Name" name="ulastname" required>
                       </div>
                 
                     
                     <!-- Multiple addons / help text -->
                     <div class="form-group">
                       <label for="sel1">Company, c/o, DHL postbox number (optional)</label>
                       <input type="text" class="form-control" placeholder="Company, c/o, DHL postbox number (optional)">
                     </div>
                     

                  
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span class="input-group-text">Street</span>
                           
                         </div>
                         
                         <input type="text" class="form-control" placeholder="street" name="ustreet" required>

                         <div class="input-group-prepend">
                           <span class="input-group-text">House No.</span>
                           
                         </div>
                         <input type="text" class="form-control_me"  name="uhome" required style="width: 70px;">
                         
                       </div>

                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Postcode</span>
                               
                             </div>
                             <input type="text" class="form-control_me" style="width: 70px;">
                             

                           <div class="input-group-prepend">
                             <span class="input-group-text">City</span>
                             
                           </div>
                           
                           <input type="text" class="form-control" name="upostcode" required>
 
                           
                         </div>

                         <div class="form-group">
                           <label for="sel1">Country:</label>
                           <select class="form-control" id="sel1">
                             <option>America</option>
                             <option>Italia</option>
                             <option>China</option>
                             <option>ect..</option>
                           </select>
                         </div>
                         
                     

                      

                     
               </div>
               <div class="col-md-6">
                   <div class="container">
                        
                   
                       <center><h3>WHAT HAPPENS NEXT</h3></center>
                       <label class="css-label">
                        <label  class="css-label">           
                       <img src="images/images (18).jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> 
                        </label></div>
                     
                     
                   
                   
                   <div class="custom-control custom-checkbox image-checkbox">
                    
                       <br>&nbsp;1&nbsp;&nbsp;: &nbsp;&nbsp; Before you order your box, we'll ask for a few more details.
                       <br>2&nbsp;&nbsp;:&nbsp;&nbsp;Your stylist will handpick items based on your answers.
                       <br>3&nbsp;&nbsp;:&nbsp;&nbsp;Try them on at home and keep what you like.
                       <br>4&nbsp;&nbsp;:&nbsp;&nbsp;You only pay for what you keep. Shipping and returns are on us.
                      
                     
                   </div>
                     </label> 
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
     <div class="col-sm-6"><button type="submit" class="btn btn-primary" >CONTINU</button></div>
   </form>
   </div>
   </div>

 </div>

@endsection

@section('scripts')
 
@endsection