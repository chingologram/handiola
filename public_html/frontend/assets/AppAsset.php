<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',                 //estilo defecto yii2     como aqui estaban los estilos de jumbotron agregue lo de los parallax
        'css/sitedos.css',              //estilo incorporado de la pagina w3
        'css/style_box_icon.css',       //estilo box icon
        'css/style.css',                //estilo de los modal   step checkout bar   
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
