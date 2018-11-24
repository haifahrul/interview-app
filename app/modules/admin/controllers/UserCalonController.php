<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\UserCalon;
use app\models\UploadCv;
use app\models\search\UserCalonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\IntegrityException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * created haifahrul
 */
class UserCalonController extends Controller {

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
        $searchModel = new UserCalonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('view', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDownloadCv($f, $i) {

        // The location of the PDF file on the server.
        $filename = Yii::$app->params['uploadsPath'] . 'cv/' . $f;
        $newFilename = 'CV - ' . $i;

        // Let the browser know that a PDF file is coming.
        header("Content-Length: " . filesize($filename));
        header("Content-type: application/pdf");
        header('Content-Disposition: inline; filename="' . $newFilename . '"');

        // Send the file to the browser.
        readfile($filename);
        exit;
    }

    public function actionCreate() {
        $model = new UserCalon();
        $modelUploadCv = new UploadCv();
        $model->status = 2;
        $is_ajax = Yii::$app->request->isAjax;
        $postdata = Yii::$app->request->post();

        if ($model->load($postdata) && $model->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {

                $modelUploadCv->fileCv = UploadedFile::getInstance($modelUploadCv, 'fileCv');
                if ($modelUploadCv->upload()) {
                    // if file is uploaded successfully
                    $model->cv = $modelUploadCv->filename;

                    if ($model->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan!');
                        return $this->redirect(['index']);
                    }
                }
            } catch (Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        }

        if ($is_ajax) {
//render view
            return $this->renderAjax('create', [
                        'model' => $model,
                        'modelUploadCv' => $modelUploadCv,
            ]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'modelUploadCv' => $modelUploadCv,
            ]);
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $oldFilename = $model->cv;
        $oldFileCv = Yii::$app->params['uploadsPath'] . 'cv/' . $model->cv;
        $modelUploadCv = new UploadCv();
        $postdata = Yii::$app->request->post();

        if ($model->load($postdata) && $model->validate() && $modelUploadCv->load($postdata)) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $modelUploadCv->fileCv = UploadedFile::getInstance($modelUploadCv, 'fileCv');

                if ($modelUploadCv->upload()) {
                    // file is uploaded successfully

                    if (file_exists($oldFileCv) && !empty($oldFilename)) {
                        unlink($oldFileCv);
                    }

                    $model->cv = $modelUploadCv->filename;
                    $model->cv_extension = $modelUploadCv->fileExtension;
                    if ($model->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan!');

                        return $this->redirect(['index']);
                    }
                }
            } catch (Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('update', [
                            'model' => $model,
                            'modelUploadCv' => $modelUploadCv,
                ]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                            'modelUploadCv' => $modelUploadCv,
                ]);
            }
        }
    }

    public function actionDelete($id) {
        $model = $this->findModel($id);
        $oldFile = $model->cv;
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($model->delete()) {
                $transaction->commit();
                unlink(Yii::$app->params['uploadsPath'] . 'cv/' . $oldFile);
                Yii::$app->session->setFlash('success', 'Data has been removed!');

                return $this->redirect(['index']);
            }
        } catch (IntegrityException $e) {
            $transaction->rollback();
            Yii::$app->session->setFlash('danger', 'Failure, Data failed removed');
            throw new \yii\web\HttpException(500, "Data ini sedang digunakan di menu Jadwal Wawancara dan atau HHasil Wawancara.", 405);
        } catch (\Exception $e) {

            $transaction->rollBack();
            throw new \yii\web\HttpException(500, "Halaman tidak ditemukan", 405);
        }

        return $this->redirect(['index']);
    }

// hapus menggunakan ajax
    public function actionDeleteItems() {
        $status = 0;
        if (isset($_POST['keys'])) {
            $keys = $_POST['keys'];
            foreach ($keys as $key):

                $model = UserCalon::findOne($key);
                if ($model->delete())
                    $status = 1;
                else
                    $status = 2;
            endforeach;

//$model = UserCalon::findOne($keys);
//$model->delete();
//$status=3;
        }
// retrun nya json
        echo Json::encode([
            'status' => $status,
        ]);
    }

    protected function findModel($id) {
        if (($model = UserCalon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
