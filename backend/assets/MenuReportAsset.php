<?php

namespace backend\assets;

use yii\web\AssetBundle;
    /**
     * 
     * This is style to print reports on pdf
     * 
     */
    class MenuReportAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl  = '@web';

        public $css      = [
            //'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
            'css/menu_report_bootstrap.css',
        ];
        public $js       = [
            'js/menu_report_bootstrap.js',
        ];
        public $depends  = [
            'yii\web\JqueryAsset',
        ];
    }
    