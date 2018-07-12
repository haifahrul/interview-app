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
use app\components\Model;

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

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
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
        // CHeck if calon sudah di interview
        if (empty(JadwalWawancara::findOne(['id' => $id, 'status' => 1]))) {
            $model = new Formulir();
            $modelKriPen = new FormulirKriteriaPenilaian();
            $modelKomPos = new FormulirKompetensiPosisi();
            $modelJadwal = $this->findModelJadwal($id);
            $modelAskepPenilaianQuery = Yii::$app->db->createCommand('SELECT ap.id, ap.nama, apt.nama as `group`, ap.is_active FROM aspek_penilaian as ap JOIN aspek_penilaian_tipe as apt ON apt.id=ap.aspek_penilaian_tipe_id WHERE ap.is_active=1 ORDER BY apt.`order`')->queryAll();
            $modelAskepPenilaian = ArrayHelper::map($modelAskepPenilaianQuery, 'id', 'nama', 'group');

            $model->calon_id = $modelJadwal->user_calon_id;
            $model->interviewer_id = $modelJadwal->user_interviewer_id;
            $model->tanggal_wawancara = $modelJadwal->tanggal;

            $is_ajax = Yii::$app->request->isAjax;
            $postData = Yii::$app->request->post();

            if ($model->load($postData) && ($modelKriPen->load($postData)) && ($modelKomPos->load($postData))) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($model->save()) {
                        $skor = [];
                        foreach ($modelKriPen->attributes['kriteria_penilaian'] as $key => $value) {
                            $insertKriPen = new FormulirKriteriaPenilaian();
                            $insertKriPen->formulir_id = $model->id;
                            $insertKriPen->aspek_penilaian_id = $key;
                            $insertKriPen->kriteria_penilaian = $value;
                            $insertKriPen->save();

                            if (!empty($value)) {
                                $skor[] = $value;
                            }
                        }

                        $arrayKomPosPenilaian = $modelKomPos->attributes['kriteria_penilaian'];
                        foreach ($modelKomPos->attributes['aspek_penilaian'] as $key => $value) {
                            $insertKomPos = new FormulirKompetensiPosisi();
                            $insertKomPos->formulir_id = $model->id;
                            $insertKomPos->aspek_penilaian = $value;
                            $insertKomPos->kriteria_penilaian = $arrayKomPosPenilaian[$key];
                            $insertKomPos->save();

                            if (!empty($arrayKomPosPenilaian[$key])) {
                                $skor[] = $arrayKomPosPenilaian[$key];
                            }
                        }
                        
                        $modelJadwal->status = 1; // Sudah di wawancara
                        $modelJadwal->update();

                        // $this->findModelCalon($model->);

                        // Hitung Nilai
                        $jumlahPertanyaan = count($skor) * 7;
                        $skor = array_sum($skor);
                        $x_rataRataIdeal = number_format((int)$jumlahPertanyaan / 2, 2);
                        $s_tandarDeviasi = number_format($x_rataRataIdeal / 3, 2);
                        $z_nilai = 1.00;
                        
                        $min = number_format($x_rataRataIdeal - ($z_nilai * $s_tandarDeviasi), 2);
                        $max = number_format($x_rataRataIdeal + ($z_nilai * $s_tandarDeviasi), 2);
                        
                        $model->nilai = $skor;
                        if ($skor < $min) {
                            $model->keputusan_id = 3; // Ditolak
                        } elseif ($skor >= $min && $skor <= $max) {
                            $model->keputusan_id = 2; // Dipertimbangkan
                        } elseif ($skor > $max) {
                            $model->keputusan_id = 1; // Disaranakan
                        }
                        $model->update();
                        // End Hitung Nilai

                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan!');
                        return $this->redirect(['/formulir/view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollback();
                    Yii::$app->session->setFlash('danger', ' Data gagal disimpan!');
                    throw $e;
                }
            } else if ($is_ajax) {
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
        } else {
            Yii::$app->session->setFlash('danger', ' Data yang Anda cari tidak ditemukan atau Kandidat sudah di Wawancara!');
            return $this->redirect(['/site/index']);
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
