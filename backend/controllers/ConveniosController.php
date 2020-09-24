<?php

namespace backend\controllers;

use Yii;
use backend\models\Convenios;
use backend\models\ConveniosSearch;
use backend\controllers\AppController;
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
     * Creates a new Convenios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Convenios();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())){
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->senha);
            $model->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
            $model->status = 10;
            $model->auth_key = Yii::$app->security->generateRandomString();
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post())){
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->senha);
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Convenios model.
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
                Yii::$app->session->setFlash('success', 'Convenio excluido com sucesso.');
                return $this->redirect(['index']);
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'Você não tem permissão para acessar esta ação.');
            return $this->redirect(['index']);
        }  
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
