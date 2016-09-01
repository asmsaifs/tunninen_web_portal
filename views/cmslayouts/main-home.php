<?php
use richardfan\widget\JSRegister;
?>
<header>	
<div class="w3-content w3-section" style="width:100%">
    <a href="#"><img src="img/header.jpg" class="mySlides w3-animate-fading responsive" style="width:100%" alt="Logo"></a>
    <a href="#"><img src="img/header2.jpg" class="mySlides w3-animate-fading responsive" style="width:100%" alt="Logo"></a>  
</div>
    <div class="header-content">
        <div class="header-content-inner">
            <img src="img/tunninen-logo.png" width="332" height="103" alt="Logo">
            <h1>Secure ICT solutions</h1>
            <hr>
            <p>monitoring, security, and information management</p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
        </div>
    </div>
</header>
<?= $placeholders['content']; ?>

<?php JSRegister::begin(); ?>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000); // Change image every 2 seconds
}


var myIndex2 = 0;
var myIndex3 = 0;
var myIndex4 = 0;
var myIndex5 = 0;
var myIndex6 = 0;
var myIndex7 = 0;
carousel2();

function carousel2() {
    var i;
    var x = document.getElementsByClassName("recentWork1");
	var x1 = document.getElementsByClassName("recentWork2");
	var x2 = document.getElementsByClassName("recentWork3");
	var x3 = document.getElementsByClassName("recentWork4");
	var x4 = document.getElementsByClassName("recentWork5");
	var x5 = document.getElementsByClassName("recentWork6");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";	   
    }
	
	for (i = 0; i < x1.length; i++) {       
	   x1[i].style.display = "none";	   
    }
	
	for (i = 0; i < x2.length; i++) {       
	   x2[i].style.display = "none";	   
    }
	
	for (i = 0; i < x3.length; i++) {       
	   x3[i].style.display = "none";	   
    }
	
	for (i = 0; i < x4.length; i++) {       
	   x4[i].style.display = "none";	   
    }
	
	for (i = 0; i < x5.length; i++) {       
	   x5[i].style.display = "none";	   
    }
	
    myIndex2++;
	myIndex3++;
	myIndex4++;
	myIndex5++;
	myIndex6++;
	myIndex7++;
	
    if (myIndex2 > x.length) {myIndex2 = 1}
    x[myIndex2-1].style.display = "block";
	
	if (myIndex3 > x1.length) {myIndex3 = 1}
    x1[myIndex3-1].style.display = "block";
	
	if (myIndex4 > x2.length) {myIndex4 = 1}
    x2[myIndex4-1].style.display = "block";
	
	if (myIndex5 > x3.length) {myIndex5 = 1}
    x3[myIndex5-1].style.display = "block";
	
	if (myIndex6 > x4.length) {myIndex6 = 1}
    x4[myIndex6-1].style.display = "block";
	
	if (myIndex7 > x5.length) {myIndex7 = 1}
    x5[myIndex7-1].style.display = "block";
    setTimeout(carousel2, 3000); // Change image every 2 seconds
}



</script>



<?php JSRegister::end(); ?>