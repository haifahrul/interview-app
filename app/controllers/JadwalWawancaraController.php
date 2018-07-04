<?php

namespace app\controllers;

use app\models\JadwalWawancara;
use app\models\search\JadwalWawancaraSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * created haifahrul
 */

class JadwalWawancaraController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new JadwalWawancaraSearch();
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

    public function actionCreate($id = null)
    {
        $model = new JadwalWawancara();
        $is_ajax = Yii::$app->request->isAjax;
        $postdata = Yii::$app->request->post();

        if (!empty($id)) {
            $model->user_calon_id = $id;
        }

        if ($model->load($postdata) && $model->validate()) {
            $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
                Yii::$app->session->setFlash('success', ' Data has been saved!');
                
                return $this->redirect(['index']);
            }
        } 
          
        if (Yii::$app->request->isAjax) {
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);

            }
    }

    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {

//query
            if ($this->findModel($id)->delete()):
                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Data has been removed!');
                return $this->redirect(['index']);
            else:
                $transaction->rollback();
                Yii::$app->session->setFlash('warning', 'Data failed removed!');
            endif;

        } catch (Exception $e) {
            $transaction->rollback();
            Yii::$app->session->setFlash('danger', 'Failure, Data failed removed');
        }
        return $this->redirect(['index']);
    }

// hapus menggunakan ajax
    public function actionDeleteItems()
    {
        $status = 0;
        if (isset($_POST['keys'])) {
            $keys = $_POST['keys'];
            foreach ($keys as $key):

                $model = JadwalWawancara::findOne($key);
                if ($model->delete()) {
                    $status = 1;
                } else {
                    $status = 2;
                }

            endforeach;

//$model = JadwalWawancara::findOne($keys);
            //$model->delete();
            //$status=3;
        }
// retrun nya json
        echo Json::encode([
            'status' => $status,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = JadwalWawancara::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}