<?php
namespace app\controllers;

use Yii;
use app\models\Formulir;
use app\models\FormulirKriteriaPenilaian;
use app\models\FormulirKompetensiPosisi;
use app\models\search\FormulirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\UserCalon;
use app\models\UserInterviewer;
use app\models\JadwalWawancara;
use yii\helpers\ArrayHelper;

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

    public function actionCreate($id)
    {
        $model = new Formulir();
        $modelKriPen = new FormulirKriteriaPenilaian();
        $modelKomPos = new FormulirKompetensiPosisi();
        $modelJadwal = $this->findModelJadwal($id);
        $modelAskepPenilaianQuery = Yii::$app->db->createCommand('SELECT ap.id, ap.nama, apt.nama as `group`, ap.is_active FROM aspek_penilaian as ap JOIN aspek_penilaian_tipe as apt ON apt.id=ap.aspek_penilaian_tipe_id WHERE ap.is_active=1 ORDER BY apt.`order`')->queryAll();
        $modelAskepPenilaian = ArrayHelper::map($modelAskepPenilaianQuery, 'id', 'nama', 'group');

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
            } catch (Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        }

        if ($is_ajax) {
            return $this->renderAjax('create', [
                    'model' => $model,
                    'modelJadwal' => $modelJadwal,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
                    'modelAskepPenilaian' => $modelAskepPenilaian
            ]);
        } else {
            return $this->render('create', [
                    'model' => $model,
                    'modelJadwal' => $modelJadwal,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
                    'modelAskepPenilaian' => $modelAskepPenilaian
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

    protected function findModelJadwal($id)
    {
        if (($model = JadwalWawancara::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelCalon($id)
    {
        if (($model = UserCalon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelInterviewer($id)
    {
        if (($model = UserInterviewer::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
