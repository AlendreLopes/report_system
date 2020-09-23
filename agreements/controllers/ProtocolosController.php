<?php

namespace agreements\controllers;

use Yii;
use agreements\models\Protocolos;
use agreements\models\ProtocolosSearch;
use agreements\controllers\AppController;
use yii\data\Pagination;

use yii\i18n\Formatter;
use kartik\mpdf\Pdf;
// New class to print in Pdf
use common\helpers\fpdf\FPdf;
/**
 * ProtocolosController implements the CRUD actions for Protocolos model.
 */
class ProtocolosController extends AppController
{
    /**
     * Lists all Protocolos models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Procurar pelo id do conveniado
        $searchModel = new ProtocolosSearch();
        $query = Protocolos::find()->where(['convenio_id' => Yii::$app->user->id]);
        //
        $paginacao = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        $protocolos = $query->orderBy(['id' => SORT_DESC])
            ->offSet($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();
        //
        return $this->render('index', [
            'protocolos' => $protocolos,
            'paginacao' => $paginacao,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = "mainPrint";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewSearch()
    {
        $searchModel = new ProtocolosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view-search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    //public function actionViewPrint($id)
    public function actionViewPrint()
    {
        // Testando a classe
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        return $this->render('index');
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPetImagemDiagnosticosVeterinarios($id)
    {
        // get your HTML raw content without any layouts or scripts
        $model   = $this->findModel($id);
        $content = $this->renderPartial('view',['model'=> $model]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@app/web/css/print_reports_pdf_wimgs_print.css',
            //'cssFile' => '@app/web/css/print_reports_pdf_wimgs.css',
            // any css to be embedded if required
            'cssInline' => 'body{font-size:10px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Laudos'],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Pet Imagem',
                'SetSubject' => 'Generado em PDF: ' . date("D M j Y G:i:s"),
                'SetHeader' => ['Pet Imagem - Diagnósticos por Imagem'],
                'SetAuthor' => 'Danielle Tullio Murad CRMVPR-4595',
                'SetCreator' => 'Danielle Tullio Murad Médica Veterinária Imaginologista',
                'SetKeywords' => 'Pet Imagem, Diagnósticos por Imagem, Laudos, Anatomia Patológica, Diagnóstico por Imagens, Laboratorial',
                'SetFooter' => [ "Pet Imagem Diagnósticos por Imagem " . Yii::$app->formatter->asDate(date('Y-m-d')) . ' - Página {PAGENO}'],
                //'defaultFontSize' => '10px',
            ],
        ]);
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Displays a single Protocolos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        return $this->render('index');
    }

    /**
     * Finds the Protocolos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Protocolos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Protocolos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
