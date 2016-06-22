<?php

namespace app\blocks;

/**
 * Block created with Luya Block Creator Version 1.0.0-beta6 at 15.06.2016 11:39
 */
class NewsBlock extends \cmsadmin\base\Block
{
    /**
     * @var bool Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = false;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    public function name()
    {
        return 'NewsBlock';
    }

    public function icon()
    {
        return 'extension'; // choose icon from: http://materializecss.com/icons.html
    }

    public function config()
    {
        return [
           'vars' => [
               ['var' => 'title', 'label' => 'Block Title', 'type' => 'zaa-text'],
           ],
        ];
    }

    /**
     * Return an array containg all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
        ];
    }

    /**
     * Available twig variables:
     * @param {{vars.title}}
     */
    public function twigFrontend()
    {
        $content =
        '<aside class="bg-dark-latest-news">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>{{vars.title}}</h2>
                <!--<a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>-->
            </div>
        </div>
    </aside>
    
    <section id="services" style="padding-top:0px !important;color:#FFF;background-color: #FF8442;">
        
        <div class="container">
            <div class="row">';
        
        foreach(\newsadmin\models\Article::find()->all() as $item){
            $content.='<div class="col-lg-4 col-sm-6 text-center">
                    <div class="service-box">';
            $content.= '<h3>'.$item->title.'</h3>
                <p class="text-justify">'.$item->text.'</p>';
            $content.='<a href="#" class="btn btn-info btn-xl page-scroll">More</a>
                    </div>
                </div>';
        }                                                                                      
                        
    $content.='</div>
            </div>    
    </section>';
       return $content;
    }

    /**
     * Available twig variables:
     * @param {{vars.title}}
     */
    public function twigAdmin()
    {
        return '<p>News Block</p>';
    }
}
