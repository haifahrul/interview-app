<?php
namespace app\modules\admin\controllers;

use Yii;
use app\models\LogError;
use app\models\search\LogErrorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * created haifahrul
 */
class LogErrorController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['clear-log-error'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new LogErrorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('view', [
                    'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionClearLogError()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            LogError::deleteAll();
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Data has been removed!');
        } catch (Exception $e) {
            $transaction->rollback();
            Yii::$app->session->setFlash('danger', 'Failure, Data failed removed');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = LogError::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
