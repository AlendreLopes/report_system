<?php

namespace common\components;

use yii\i18n\Formatter;

class NewFormatter extends Formatter{
    // Treat date to db
	public function treatDate($unset,$set,$data)
	{
		$data_unset = explode($unset,$data);
		$data_set   = implode($set,array_reverse($data_unset));
		return      $data_set;
    }
    
    public function returnMonth($month){
        switch ($month) {
            case '01':
                echo "Curitiba " . date('d') . " de Janeiro de "  . date('Y');
                break;
            case '02':
                echo "Curitiba " . date('d') . " de Fevereiro de "  . date('Y');
                break;
            case '03':
                echo "Curitiba " . date('d') . " de Março de "  . date('Y');
                break;
            case '04':
                echo "Curitiba " . date('d') . " de Abril de "  . date('Y');
                break;
            case '05':
                echo "Curitiba " . date('d') . " de Maio de "  . date('Y');
                break;
            case '06':
                echo "Curitiba " . date('d') . " de Junho de "  . date('Y');
                break;
            case '07':
                echo "Curitiba " . date('d') . " de Junho de "  . date('Y');
                break;
            case '08':
                echo "Curitiba " . date('d') . " de Agosto de "  . date('Y');
                break;
            case '09':
                echo "Curitiba " . date('d') . " de Setembro de "  . date('Y');
                break;
            case '10':
                echo "Curitiba " . date('d') . " de Outubro de "  . date('Y');
                break;
            case '11':
                echo "Curitiba " . date('d') . " de Novembro de "  . date('Y');
                break;
            case '12':
                echo "Curitiba " . date('d') . " de Dezembro de "  . date('Y');
                break;
        }
    }
}

