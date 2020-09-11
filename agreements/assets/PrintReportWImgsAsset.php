<?php

namespace agreements\assets;

use yii\web\AssetBundle;
    /**
     * 
     * This is style to print reports on pdf
     * 
     */
    class PrintReportWebAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl  = '@web';

        public $css      = [
            'css/print_report_pdf_wimgs.css'
        ];
        
        public $js       = [];

        public $depends  = [];
        
    }
    