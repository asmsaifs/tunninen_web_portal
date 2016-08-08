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
</script>
<?php JSRegister::end(); ?>