<?php

namespace secretary\controllers;

use Yii;
use secretary\models\ProtocolosMenu;
use secretary\models\ProtocolosMenuSearch;

use yii\web\NotFoundHttpException;
use secretary\controllers\AppController;

/**
 * ProtocolosMenuController implements the CRUD actions for ProtocolosMenu model.
 */
class ProtocolosMenuController extends AppController
{
    /**
     * Lists all ProtocolosMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProtocolosMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProtocolosMenu model.
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
     * Creates a new ProtocolosMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProtocolosMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProtocolosMenu model.
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
     * Deletes an existing ProtocolosMenu model.
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
     * Finds the ProtocolosMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProtocolosMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProtocolosMenu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
