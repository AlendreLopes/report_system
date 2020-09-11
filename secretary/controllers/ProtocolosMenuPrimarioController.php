<?php

namespace app\modules\secretaria\controllers;

use Yii;
use app\modules\secretaria\models\ProtocolosMenuPrimario;
use app\modules\secretaria\models\ProtocolosMenuPrimarioSearch;

use yii\web\NotFoundHttpException;
use app\controllers\AppController;

/**
 * ProtocolosMenuPrimarioController implements the CRUD actions for ProtocolosMenuPrimario model.
 */
class ProtocolosMenuPrimarioController extends AppController
{
    /**
     * Lists all ProtocolosMenuPrimario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProtocolosMenuPrimarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProtocolosMenuPrimario model.
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
     * Creates a new ProtocolosMenuPrimario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProtocolosMenuPrimario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProtocolosMenuPrimario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProtocolosMenuPrimario model.
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
                Yii::$app->session->setFlash('success', 'Menu excluido com sucesso.');
                return $this->redirect(['index']);
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'Você não tem permissão para acessar esta ação.');
            return $this->redirect(['index']);
        }  
    }

    /**
     * Finds the ProtocolosMenuPrimario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProtocolosMenuPrimario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProtocolosMenuPrimario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
