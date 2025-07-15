
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mySlide">
    <div class="home">
        <div class="image">
            <img src="image/online6.jpg" alt="online">
        </div>
        
    </div>  
    <div class="home">
        <div class="image">
            <img src="image/online7.jpg" alt="online4">
        </div>
    </div>
    
    <div class="home">
        <div class="image">
            <img src="image/online5.png" alt="online5">
        </div>
    </div>
 <div class="nav">
            <ul>
                <li><a href=#note>NOTES</a></li>
                <li><a href=#courses>COURSES</a></li>
                <li><a href=#todolist>TODOLIST</a></li>
                <li><a href=#aboutus>ABOUT US</a></li>

            </ul>  
        </div> 


</div>

<div class="waviy">
   <span style="--i:1">W</span>
   <span style="--i:2">E</span>
   <span style="--i:3">L</span>
   <span style="--i:4">C</span>
   <span style="--i:5">O</span>
   <span style="--i:6">M</span>
   <span style="--i:7">E</span>
  

  </div>


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
  <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("home");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
      
   
    
    
</body>
</html>
