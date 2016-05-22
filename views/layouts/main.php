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
        <title><?php echo Yii::$app->siteTitle;?> &mdash; <?php echo $this->title; ?></title>
        <?php $this->head() ?>
    </head>
    <body id="page-top">

    <?php $this->beginBody() ?>
    <div <?=(Yii::$app->menu->home)?'id="header"':'';?>>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php //echo Yii::$app->siteTitle;?> <img src="img/small_logo.png" width="106" height="34" alt="Logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php foreach (Yii::$app->menu->find()->where(['parent_nav_id' => 0, 'container' => 'default'])->all() as $item): ?>
                        <li <?php if ($item->isActive): ?> class="active"<?php endif;?>>
                            <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                            <?php if ($item->hasChildren()): ?>
                            <ul>
                                <?php foreach ($item->children as $child): ?>
                                    <li <?php if ($child->isActive): ?> class="active"<?php endif;?>><a href="<?php echo $child->link; ?>">&raquo; <?php echo $child->title; ?></a></li>
                                    
                                    <?php if ($child->hasChildren()): ?>
                                    <ul>
                                        <?php foreach ($child->children as $grandChild): ?>
                                            <li <?php if ($grandChild->isActive): ?> class="active"<?php endif;?>><a href="<?php echo $grandChild->link; ?>">&raquo; <?php echo $grandChild->title; ?></a>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                    
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>            
 </div>   
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
            <?php echo $content; ?>
            <!--    </div>
            </div>
        </div> -->
        <!-- <div id="footer"> -->
        <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>IT Tunninen Oy 
Business ID 2056618-3 
Huoltopiste Rekolantie 62, 2nd floor, 
01400 Vanta</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About tunninen oy</h3>
                        <p>Companies comprehensive ICT service solutions for cyber security software solutions. Coordinated systems save costs and make it easier to tiedonsaantia- and distribution. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo Yii::$app->siteTitle.' '.date("Y");?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- </div> -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>