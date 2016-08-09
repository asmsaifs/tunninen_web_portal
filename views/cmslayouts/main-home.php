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
	   x1[i].style.display = "none";
	   x2[i].style.display = "none";
	   x3[i].style.display = "none";
	   x4[i].style.display = "none";
	   x5[i].style.display = "none";
    }
	
    myIndex2++;
    if (myIndex2 > x.length) {myIndex2 = 1}
    x[myIndex2-1].style.display = "block";
	
	if (myIndex2 > x1.length) {myIndex2 = 1}
    x1[myIndex2-1].style.display = "block";
	
	if (myIndex2 > x2.length) {myIndex2 = 1}
    x2[myIndex2-1].style.display = "block";
	
	if (myIndex2 > x3.length) {myIndex2 = 1}
    x3[myIndex2-1].style.display = "block";
	
	if (myIndex2 > x4.length) {myIndex2 = 1}
    x4[myIndex2-1].style.display = "block";
	
	if (myIndex2 > x5.length) {myIndex2 = 1}
    x5[myIndex2-1].style.display = "block";
    setTimeout(carousel2, 3000); // Change image every 2 seconds
}



</script>



<?php JSRegister::end(); ?>