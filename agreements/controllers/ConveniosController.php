<?php

namespace agreements\controllers;

use Yii;
use agreements\models\Convenios;
use agreements\models\ConveniosSearch;
use agreements\controllers\AppController;
use yii\web\NotFoundHttpException;

/**
 * ConveniosController implements the CRUD actions for Convenios model.
 */
class ConveniosController extends AppController
{
    /**
     * Lists all Convenios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConveniosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Convenios model.
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
     * Updates an existing Convenios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->request->isAjax){

        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Convenios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePass($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update-pass', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Convenios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Convenios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Convenios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
