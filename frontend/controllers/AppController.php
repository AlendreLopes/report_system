<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * AppController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC ) for your controllers and their actions.
 */
 class AppController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'roles' => ['?'],
                        'allow' => true,
                        'actions' => ['index', 'contact', 'about', 'error', 'login', 'request-password-reset'],
                    ],
                    [
                        'roles' => ['@'],
                        'allow' => true,
                        'actions' => [
                            'index', 'view', 'view-search', 'view-print', 'view-print-reports', 
                             'racas', 'about', 'contatc', 'signup', 'logout'],
                    ],
                    [
                        'roles' => ['secretary'],
                        'allow' => true,
                        'actions' => ['create', 'update', 'create-reaport', 'update-report'],
                    ],
                    [
                        'roles' => ['admin'],
                        'allow' => true,
                        'actions' => ['delete'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ], // verbs
        ]; // return

    } // behaviors
 
} // AppController
