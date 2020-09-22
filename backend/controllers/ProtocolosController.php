<?php

namespace backend\controllers;

use Yii;
use backend\models\Protocolos;
use backend\models\ProtocolosSearch;

use backend\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\i18n\Formatter;
use kartik\mpdf\Pdf;

use  yii\db\Query;
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
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies['protocolos_id'])) {
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('protocolos_id');
        }
        $searchModel = new ProtocolosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Lists search Protocolos models to send print.
     * @return mixed
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
     * Displays a single Protocolos model to list reports to print.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewPrint($id)
    {
        $this->layout = "mainPrint";
        return $this->render('view-print', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Displays a single Protocolos model to print the view-print.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewPrintReports($id)
    {
        // get your HTML raw content without any layouts or scripts
        $model = $this->findModel($id);
        $content = $this->renderPartial('view-print',['model'=> $model]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
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
            'cssFile' => '@app/web/css/print_report_pdf.css',
            // any css to be embedded if required
            'cssInline' => 'body{font-size:10px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Laudos'],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Pet Imagem',
                'SetSubject' => 'Generado em PDF: ' . date("D M j Y G:i:s"),
                //'SetHeader' => ['Pet Imagem - Diagnósticos por Imagem'],
                'SetAuthor' => 'Danielle Tullio Murad CRMVPR-4595',
                'SetCreator' => 'Danielle Tullio Murad Médica Veterinária Imaginologista',
                'SetKeywords' => 'Pet Imagem, Diagnósticos por Imagem, Laudos, Anatomia Patológica, Diagnóstico por Imagens, Laboratorial',
                'SetFooter' => [ "Pet Imagem Diagnósticos por Imagem " . Yii::$app->formatter->asDate(date('Y-m-d')) . ' - Página {PAGENO}'],
            ],
        ]);
        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    /**
     * Creates a new Protocolos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        //$model = new Protocolos(['scenario' => 'create']);
        $model = new Protocolos();
        if ($model->load(Yii::$app->request->post())) {
            $model->expirar = date('Y-m-d',strtotime("+ 60 days"));
            $model->motedepass_hash = Yii::$app->getSecurity()->generatePasswordHash($model->motedepass);
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    */
    /**
     * Create a new Report 
     * This will view template to show some data
     * @return mixed
     */
    public function actionCreateReport($id)
    {
        $model = $this->findModel($id);
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'protocolos_id',
            'value' => $model->id,
        ]));
        return $this->render('create-report', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Protocolos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //['scenario' => 'some_scenario']
        if ($model->load(Yii::$app->request->post())){
            //$cadRetornaData = Yii::$app->formatter->treatDate('/','-',$model->cadastrado);
            //$expRetornaData = Yii::$app->formatter->treatDate('/','-',$model->expirar);
            //$model->cadastrado = $cadRetornaData;
            //$model->expirar = $expRetornaData;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    */
    /**
     * Deletes an existing Protocolos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin'))
        {
            if ($this->findModel($id)->delete())
            {
                Yii::$app->session->setFlash('success', 'Protocolo excluido com sucesso.');
                return $this->redirect(['index']);
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'Você não tem permissão para acessar esta ação.');
            return $this->redirect(['index']);
        }  
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
