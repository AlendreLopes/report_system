<?php

namespace agreements\controllers;

use Yii;
use agreements\models\Protocolos;
use agreements\controllers\AppController;
use yii\data\Pagination;

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
        $query = Protocolos::find()->where(['convenio_id' => Yii::$app->user->id]);
        //
        $paginacao = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $protocolos = $query->orderBy('id')
            ->offSet($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();
        //
        return $this->render('index', [
            'protocolos' => $protocolos,
            'paginacao' => $paginacao,
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
