<!DOCTYPE html>
<html>
<title>auto play slider</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


.mySlides {display: none;} 
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 80%   ;
  position: relative;
  margin: auto;
  
}



.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
 
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="componentes/images/img-construccion1.jpg" style="width:100%; ">
</div>

<div class="mySlides fade">
  <img src="componentes/images/img-construccion4.jpg" style="width:100%; ">
</div>

<div class="mySlides fade">
  <img src="componentes/images/img-construccion3.jpg" style="width:100%; ">
</div>

</div>
<br>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}


</script>

</body>
</html> 