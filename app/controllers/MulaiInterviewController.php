<?php
namespace app\controllers;

use Yii;
use app\models\Formulir;
use app\models\search\FormulirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * created haifahrul
 */
class MulaiInterviewController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'], /// Action delete hanya diizinkan post saja 
                ],
            ],
        ];
    }

    public function actionView($id)
    {
        exit(var_dump($id));
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

    public function actionCreate()
    {
        $model = new Formulir();
        $is_ajax = Yii::$app->request->isAjax;
        $postdata = Yii::$app->request->post();
        if ($model->load($postdata) && $model->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {

                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', ' Data telah disimpan!');
                    return $this->redirect(['index']);
                }
//end if (save) 
            } catch (Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        }

        if ($is_ajax) {
//render view
            return $this->renderAjax('create', [
                    'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                    'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Formulir::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}