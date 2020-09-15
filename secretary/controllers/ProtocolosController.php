<?php

namespace secretary\controllers;

use Yii;
use secretary\models\Protocolos;
use secretary\models\ProtocolosSearch;
use secretary\models\Especies;
use secretary\models\EspeciesRacas;
use secretary\models\Convenios;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use secretary\controllers\AppController;
use kartik\mpdf\Pdf;

use yii\i18n\Formatter;
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
        $session = Yii::$app->session;
        if ($session->has('novo_protocolo')) {
            $session->remove('novo_protocolo');
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
        //$model->scenario = 'update';
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
    public function actionViewPrintProtocols($id)
    {
        $this->layout = "mainPrint";
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('view-print',['model'=> $this->findModel($id)]);
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
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssFile' => '@app/web/css/print_protocols_pdf.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Laudos'],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Pet Imagem',
                'SetSubject' => 'Generado em PDF: ' . date("D M j Y G:i:s"),
                'SetHeader' => ['Pet Imagem - Diagnóstico por Imagens'],
                'SetAuthor' => 'Danielle Tullio Murad CRMVPR-4595',
                'SetCreator' => 'Danielle Tullio Murad Médica Veterinária Imaginologista',
                'SetKeywords' => 'Pet Imagem, Diagnósticos por Imagem, Laudos, Anatomia Patológica, Diagnóstico por Imagens, Laboratorial',
                'SetFooter' => ['{PAGENO}'],
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
    public function actionCreate()
    {
        $session = Yii::$app->session;
        if(!$session->has('novo_protocolo')){
            if ($session->isActive){
                $session = new yii\web\Session;
                $session->open();
                $session['novo_protocolo'] = new \ArrayObject;
                $getLastId = Protocolos::find()->select(['numero', 'username'])->orderBy(['id' => SORT_DESC])->one();
                $session['novo_protocolo']['numero']     = str_pad(($getLastId['numero'] + 1), 8, '0', STR_PAD_LEFT);
                $session['novo_protocolo']['protocolo']  = $session['novo_protocolo']['numero'] . "-" . date('y');
                $session['novo_protocolo']['motedepass'] = Yii::$app->getSecurity()->generateRandomString(8);
                $session->close();
            }
        }
        $model = new Protocolos();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {
            // Data de expiração para a visualização do protocolo
            //$model->expirar = date('Y-m-d',strtotime("+ 60 days"));
            $model->numero = $session['novo_protocolo']['numero'];
            // Os hashs de acesso ao protocolo
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->motedepass); 
            $model->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
            $model->status = 10;
            $model->auth_key = Yii::$app->security->generateRandomString();
            //Pega os títulos por enquando das Espécies e Raças
            $especieTitulo = Especies::findOne($model->especie)->titulo;
            $especieRacaTitulo = EspeciesRacas::findOne($model->especie_raca)->titulo;
            $model->especie = $especieTitulo;
            $model->especie_raca = $especieRacaTitulo;
            if ($model->save()) {
                //$session = Yii::$app->session;
                if ($session->has('novo_protocolo')) {
                    $session->remove('novo_protocolo');
                }
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post())){
            $especieTitulo = Especies::findOne($model->especie)->titulo;
            $especieRacaTitulo = EspeciesRacas::findOne($model->especie_raca)->titulo;
            $model->especie = $especieTitulo;
            $model->especie_raca = $especieRacaTitulo;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

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
    // List races
    public function getRacasList($id)
    {
        $especieRacaList = EspeciesRacas::find()
            ->where(['especie_id' => $id])
            ->select(['id', 'titulo'])
            ->asArray()
            ->all();
        $numberList = 0;
        $arrayList = array();
        foreach ($especieRacaList as $menu) {
            $arrayList[$numberList]["id"]   = $menu['id'];
            $arrayList[$numberList]["name"] = $menu['titulo'];
            $numberList++;
        }
        return $arrayList;
    }
    //
    public function actionRacas()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (isset($_POST['depdrop_parents'])) {
            $menuId = empty($_POST['depdrop_parents'][0]) ? null : $_POST['depdrop_parents'][0];
            if ($menuId != null) {
                $data = [];
                $especieRacaList = EspeciesRacas::find()
                    ->where(['especie_id' => $menuId])
                    ->count();
                if ($especieRacaList) {
                    return ['output' => $this->getRacasList($menuId), 'selected' => ''];
                }
                return ['output' => $data['out'], 'selected' => $data['selected']];
            }
        } else {
            echo ['output' => '', 'selected' => ''];
        }
    }
}
