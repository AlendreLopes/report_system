<?php

namespace backend\controllers;

use Yii;
use backend\models\Protocolos;
use backend\models\LaudosApHistopatologia;
use backend\models\LaudosApHistopatologiaSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\AppController;
/**
 * LaudosApHistopatologiaController implements the CRUD actions for LaudosApHistopatologia model.
 */
class LaudosApHistopatologiaController extends AppController
{
    /**
     * Lists all LaudosApHistopatologia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies['protocolos_id'])) {
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('protocolos_id');
        }
        $searchModel = new LaudosApHistopatologiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaudosApHistopatologia model.
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
     * Creates a new LaudosApHistopatologia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $cookies = Yii::$app->request->cookies;
        $protocoloId = $cookies->getValue('protocolos_id');
        if (LaudosApHistopatologia::findOne(['protocolos_id' => $protocoloId])) {
            Yii::$app->session->setFlash('warning', 'DI Endoscopia: Protocolo já cadastrado.');
            return $this->redirect(['protocolos/create-report', 'id' => $protocoloId]);
        }
        $model = new LaudosApHistopatologia();
        $protocolo = Protocolos::findOne($protocoloId);
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->save()) {
                return $this->redirect(['update-report', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'protocoloId' => $protocoloId,
            'protocolo' => $protocolo,
        ]);
    }

    /**
     * Updates an existing LaudosApHistopatologia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $cadRetornaData = Yii::$app->formatter->treatDate('/','-',$model->concluido);
            $model->concluido = $cadRetornaData;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateReport($id)
    {
        $model = $this->findModel($id);
        $protocolo = Protocolos::findOne($model->protocolos_id);
        if ($model->load(Yii::$app->request->post())) {
            //$cadRetornaData = Yii::$app->formatter->treatDate('/', '-', $model->concluido);
            //$model->concluido = $cadRetornaData;
            if ($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->render('update-report', [
                    'model' => $model,
                    'protocolo' => $protocolo,
                ]);
            }
        }
        return $this->render('update-report', [
            'model' => $model,
            'protocolo' => $protocolo,
        ]);
    }

    /**
     * Deletes an existing LaudosApHistopatologia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('admin')) {
            if ($this->findModel($id)->delete()) {
                Yii::$app->session->setFlash('success', 'Laudo excluido com sucesso.');
                return $this->redirect(['index']);
            }
        } else {
            Yii::$app->session->setFlash('error', 'Você não tem permissão para acessar esta ação.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the LaudosApHistopatologia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaudosApHistopatologia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaudosApHistopatologia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
