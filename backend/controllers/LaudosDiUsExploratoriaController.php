<?php

namespace backend\controllers;

use Yii;
use backend\models\LaudosDiUsExploratoria;
use backend\models\LaudosDiUsExploratoriaSearch;
use backend\models\Protocolos;

use yii\web\NotFoundHttpException;
use backend\controllers\AppController;

/**
 * LaudosDiUsExploratoriaController implements the CRUD actions for LaudosDiUsExploratoria model.
 */
class LaudosDiUsExploratoriaController extends AppController
{
    /**
     * Lists all LaudosDiUsExploratoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies['protocolos_id'])) {
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('protocolos_id');
        }
        $searchModel = new LaudosDiUsExploratoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaudosDiUsExploratoria model.
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
     * Creates a new LaudosDiUsExploratoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $cookies = Yii::$app->request->cookies;
        $protocoloId = $cookies->getValue('protocolos_id');
        if (LaudosDiUsExploratoria::findOne(['protocolos_id' => $protocoloId])) {
            Yii::$app->session->setFlash('warning', 'DI US Exploratória: Protocolo já cadastrado.');
            return $this->redirect(['protocolos/create-report', 'id' => $protocoloId]);
        }
        $model = new LaudosDiUsExploratoria();
        $protocolo = Protocolos::findOne($protocoloId);
        if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing LaudosDiUsExploratoria model.
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
     * Updates an existing LaudosDiEndoscopia model.
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
     * Deletes an existing LaudosDiUsExploratoria model.
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
     * Finds the LaudosDiUsExploratoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaudosDiUsExploratoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaudosDiUsExploratoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
