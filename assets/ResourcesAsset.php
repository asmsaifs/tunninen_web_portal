<?php

namespace app\assets;

class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';
    
    public $css = [
        'css/fonts.css',
        //'//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic',
        'font-awesome/css/font-awesome.min.css',
        //'bootstrap/css/bootstrap.min.css',
        'css/bootstrap.min.css',
        'css/creative.css',
        'css/animate.min.css',
        //'bootstrap/css/bootstrap-theme.min.css',
        //'css/style.css'
    ];
    public $js = [
        //'js/bootstrap.min.js',
        'js/jquery.fittext.js',
        'js/jquery.easing.min.js',
        'js/wow.min.js',
        'js/creative.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
		//'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'rmrevin\yii\fontawesome\AssetBundle',
    ];

}
