<?php

namespace agreements\assets;

use yii\web\AssetBundle;
    /**
     * 
     * This is style to print reports on pdf
     * 
     */
    class ZipCodeAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl  = '@web';

        public $css      = [];
        public $js       = [
            'js/zip_code_asset.js',
        ];
        public $depends  = [
            'yii\web\JqueryAsset',
        ];
        
    }
    