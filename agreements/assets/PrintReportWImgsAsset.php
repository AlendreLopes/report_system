<?php

namespace agreements\assets;

use yii\web\AssetBundle;
    /**
     * 
     * This is style to print reports on pdf
     * 
     */
    class PrintReportWImgsAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl  = '@web';
        public $css      = [
            'css/print_reports_pdf_wimgs.css'
        ];
        public $js       = [];
        public $depends  = [
            'yii\bootstrap\BootstrapAsset',
        ];
    }
    