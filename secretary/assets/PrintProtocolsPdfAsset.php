<?php
namespace secretary\assets;
use yii\web\AssetBundle;
/**
 * 
 * This is style to print reports on pdf
 * 
 */
class PrintProtocolsPdfAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';

    public $css      = [
        'css/print_protocols_pdf.css',
        'https://fonts.googleapis.com/css?family=Tangerine:700',
    ];
    
    public $js       = [];

    public $depends  = [
    ];
    
}
    