	// add slider
	var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    // var txt;
    // var r = confirm("Would you like to find another format?");
    // if (r == true) {
        showSlides(slideIndex += n);
    // } else {
    //   return false;
    // }
  
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
 // var dots = new Array(0,1,2,3,4,5);  
  var slides = document.getElementsByClassName("mySlidesfade");
  //var slides_me = document.getElementById("ccont");
  //var slides_len=slides.length;
 // document.getElementById("ccont").style.visibility = "hidden";
  var dots = document.getElementsByClassName("dot");
  
  
 // document.getElementById("successBtn").style.visibility = 'hidden';alert("ok");
  if (n > slides) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides}
 // if(n != 5){document.getElementById("success").style.visibility = 'hidden';}
 // 
  if(n<5){
    
    document.getElementById("successBtn").style.visibility = 'hidden';
}
 if(n==5){
    document.getElementById("successBtn").style.visibility = "visible";
    document.getElementById("continuBtn").style.visibility = 'hidden';
  }
  for (i = 0; i < slides.length; i++) {
   slides[i].style.display = "none";
   if(dots[i].className == 5){document.getElementById("mySlidesfade").style.visibility = "show";}
  }
  for (i = 0; i < dots.length; i++) {
    
      if(dots[i].className == 5){document.getElementById("mySlidesfade").style.visibility = "show";}
     
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  
  
}


// $(document).ready(function(){
 

  
//   var i;    
//    for(var i=1;i< $('.mySlidesfade').length; i++){
//     var a;
//     var b; 
//    alert($('.mySlidesfade')[i])
//    if(a==6){
//      b.hide();
//      a.show();
//     }
//    }
  
// });
// end