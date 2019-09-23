<?php
include_once("welcome.php");
echo("<br>");
?>

<html>
<head>
<title>Digital Image Processing</title>
</head>
<body>
     <center>
	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
	<li data-target="#myCarousel" data-slide-to="4"></li>
	<li data-target="#myCarousel" data-slide-to="5"></li>
	<li data-target="#myCarousel" data-slide-to="6"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="\images\image5.png" width="85%" style="height:300px">
    </div>

    <div class="item">
      <img src="\images\image2.png" width="50%" style="height:300px">
    </div>

    <div class="item">
      <img src="\images\image7.png" width="50%" style="height:300px">
    </div>
	
	<div class="item">
      <img src="\images\image3.png" width="40%" style="height:300px">
    </div>
	
	<div class="item">
      <img src="\images\image1.png" width="45%" style="height:300px">
    </div>
	
	<div class="item">
      <img src="\images\image4.png" width="40%" style="height:300px">
    </div>
	
	<div class="item">
      <img src="\images\image6.png" width="80%" style="height:300px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     <table border="0" width="70%">
         <tr width="100%">
		     <td><h3><b>About</h3></td>
		 </tr>
		 
		 <tr width="100%">
	         <td style="padding-left:30px"><font face="Arial" size="4">
			 <p align="justify"><b>Our aim is to develop an efficient method which uses a custom image to train the classifier. This Optical Character Recognizer(OCR) 
			 extract distinct features from the input image for classifying its contents as characters specifically letters and digits. Input to 
			 the system is digital images containing the patterns to be classified. The analysis and recognition of the patterns in images are 
			 becoming more complex, yet easy with advances in technological knowledge. The present work involves application of character recognition 
			 using KNN to recognize printed text.</p>
			 </font></td>
         </tr>
		 
     </table>
	 </center>
</body>
</html>