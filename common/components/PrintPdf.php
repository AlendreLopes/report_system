<?php

namespace common\components;

use common\components\fpdf\FPdf;

class PrintPdf extends FPdf{
    // Classe para a impressão dos Laudos
    /**
     * @param
     * Protocol Id int
     */
    /**
     * Header of Report
     */
    public function Header()
    {
        # IMG Cabeçalho
        //$this->Image(Yii::getAlias('@uploads').'/imgs_print_signature/petimagem_header.jpg',10,10,30);
        # 
        $this->setFont('Arial','B',10);
        #
        $this->cell(80);
        #
        $this->cell(30,10,'Titulo',1,0,'C');
        #
        $this->Ln(20);
    }
    /**
     * Footer of Report
     */
    public function Footer()
    {
        # IMG Rodape
        //$this->Image(Yii::getAlias('@uploads').'/imgs_print_signature/petimagem_footer.jpg',10,10,30);
        # Posicionamento na
        $this->setY(-5);
        #
        $this->setFont('Arial','I',10);
        #
        $this->cell(0,10,'Página ' . $this->pageNo() . '/{nb}',0,0,'C');
    }
}