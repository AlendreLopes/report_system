<?php

namespace backend\assets;

use yii\web\AssetBundle;
    /**
     * 
     * This is style to print reports on pdf
     * 
     */
    class PrintReportPdfAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl  = '@web';
        public $css      = [
            'css/print_report_pdf.css'
        ];
        public $js       = [];
        public $depends  = [
            'yii\bootstrap\BootstrapAsset',
        ];
    }
    