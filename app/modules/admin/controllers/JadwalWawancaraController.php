<?php

namespace app\modules\admin\controllers;

use app\models\JadwalWawancara;
use app\models\search\JadwalWawancaraSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * created haifahrul
 */
class JadwalWawancaraController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'], /// Action delete hanya diizinkan post saja
                ],
            ],
        ];
    }

    public function actionIndex() {
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('Super User')) {
            $searchModel = new JadwalWawancaraSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else if (Yii::$app->user->can('Interviewer')) {
            $searchModel = new JadwalWawancaraSearch();
            $dataProvider = $searchModel->searchInterviewer(Yii::$app->request->queryParams);

            return $this->render('index-interviewer', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionView($id) {
        $model = $this->findModel($id);

        if (!empty($model->userCalon->cv)) {
            $downloadCv = $model->userCalon->downloadFile($model->userCalon->cv, $model->userCalon->nama_calon);
        } else {
            $downloadCv = null;
        }

        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    public function actionCreate($id = null) {
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

    public function actionUpdate($id) {
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

    public function actionDelete($id) {
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
    public function actionDeleteItems() {
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

    public function actionAjaxGetListInterviewer() {
        $calonId = $_POST['calon_id'];

        $dataFormulir = Yii::$app->db->createCommand('SELECT interviewer_id FROM formulir f WHERE f.calon_id=:calon_id')->bindValue(':calon_id', $calonId)->queryAll();

        $interviewerId = [];
        foreach ($dataFormulir as $key => $value) {
            $interviewerId[] = $value['interviewer_id'];
        }

        $dataJadwal = Yii::$app->db->createCommand('SELECT user_interviewer_id FROM jadwal_wawancara f WHERE f.user_calon_id=:user_calon_id')->bindValue(':user_calon_id', $calonId)->queryAll();

        foreach ($dataJadwal as $key => $value) {
            $interviewerId[] = $value['user_interviewer_id'];
        }

        $dataInterviewer = (new \yii\db\Query())
                ->select(['id', 'nama_pewawancara'])
                ->from('user_interviewer')
                ->where(['not in', 'id', $interviewerId])
                ->all();

        $data = ArrayHelper::map($dataInterviewer, 'id', 'nama_pewawancara');

        echo json_encode($data);
    }

    protected function findModel($id) {
        if (($model = JadwalWawancara::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
