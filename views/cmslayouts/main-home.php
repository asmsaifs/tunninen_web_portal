<?php
use cms\widgets\LanguageSwitcher;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo Yii::$app->siteTitle.": 360&deg; ICT Company";?> &mdash; <?php echo $this->title; ?></title>
        <?php $this->head() ?>
        <script>
		$(document).ready(function() {
  
  var num = 10; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.navbar-default').addClass('affix-top');
    } else {
        $('.navbar-default').removeClass('affix-top');
    }
})

        </script>
    </head>
    <body id="page-top">

    <?php $this->beginBody() ?>
       
<?php //echo LanguageSwitcher::widget();?>
   
        <!-- <div class="container" id="content">
            <div class="row">
                <ol class="breadcrumb">
                    <?php foreach (Yii::$app->menu->current->teardown as $item): ?>
                    <li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                    <?php endforeach; ?>
                </ol>
            </div>
        
            <div class="row">-->
            <!-- <div id="about-us">
            <div class="container-fluid">
            </div> -->
            
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
            <!--    </div>
            </div>
        </div> -->
        <!-- <div id="footer"> -->
        
    <!-- </div> -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
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