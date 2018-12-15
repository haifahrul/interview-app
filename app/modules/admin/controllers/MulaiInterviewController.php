<?php

namespace app\modules\admin\controllers;

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
class MulaiInterviewController extends Controller {

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

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionView($id) {
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

    public function actionCreate($id) {
        // CHeck if calon sudah di interview
        if (empty(JadwalWawancara::findOne(['id' => $id, 'status' => 1]))) {
            $model = new Formulir();
            $modelKriPen = [new FormulirKriteriaPenilaian()];
            $modelKomPos = [new FormulirKompetensiPosisi()];
            $modelJadwal = $this->findModelJadwal($id);
            $modelAskepPenilaianQuery = Yii::$app->db->createCommand('SELECT ap.id, ap.nama, apt.nama as `group`, ap.is_active FROM aspek_penilaian as ap JOIN aspek_penilaian_tipe as apt ON apt.id=ap.aspek_penilaian_tipe_id WHERE ap.is_active=1 ORDER BY apt.`order`')->queryAll();
            $modelAskepPenilaian = ArrayHelper::map($modelAskepPenilaianQuery, 'id', 'nama', 'group');
            $model->calon_id = $modelJadwal->user_calon_id;
            $model->interviewer_id = $modelJadwal->user_interviewer_id;
            $model->tanggal_wawancara = $modelJadwal->tanggal;
            $model->waktu = $modelJadwal->waktu;
            $postData = Yii::$app->request->post();

            if ($model->load($postData)) {

                $modelKriPen = Model::createMultiple(FormulirKriteriaPenilaian::classname());
                Model::loadMultiple($modelKriPen, Yii::$app->request->post());

                $modelKomPos = Model::createMultiple(FormulirKompetensiPosisi::classname());
                Model::loadMultiple($modelKomPos, Yii::$app->request->post());

                $isValidModelsKriPen = Model::validateMultiple($modelKriPen);
                $isValidModelsKomPos = Model::validateMultiple($modelKomPos);

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($model->save() && ($isValidModelsKriPen && $isValidModelsKomPos)) {
                        $skor = [];
                        foreach ($modelKriPen as $key => $val) {
                            $insertKriPen = new FormulirKriteriaPenilaian();
                            $insertKriPen->formulir_id = $model->id;
                            $insertKriPen->aspek_penilaian_id = $val->attributes['aspek_penilaian_id'];
                            $insertKriPen->kriteria_penilaian = $val->attributes['kriteria_penilaian'];
                            $insertKriPen->save();

                            if (!empty($val->attributes['aspek_penilaian_id'])) {
                                $skor[] = $val->attributes['kriteria_penilaian'];
                            }
                        }

                        foreach ($modelKomPos as $key => $val) {
                            $insertKomPos = new FormulirKompetensiPosisi();
                            $insertKomPos->formulir_id = $model->id;
                            $insertKomPos->aspek_penilaian = $val->attributes['aspek_penilaian'];
                            $insertKomPos->kriteria_penilaian = $val->attributes['kriteria_penilaian'];
                            $insertKomPos->save();

                            if (!empty($val->attributes['aspek_penilaian'])) {
                                $skor[] = $val->attributes['kriteria_penilaian'];
                            }
                        }

                        $modelJadwal->status = 1; // Sudah di wawancara
                        $modelJadwal->update();

                        $nilai = array_sum($skor);

                        $countNilai = 0;
                        foreach ($skor as $val) {
                            if (!empty($val)) {
                                $countNilai += 1;
                            }
                        }

                        $result = $nilai / $countNilai;
                        $getKeputusanTipe = Yii::$app->db->createCommand('SELECT * FROM keputusan_tipe WHERE is_active=1 ORDER BY range_nilai_1 ASC')->queryAll();

                        foreach ($getKeputusanTipe as $key => $val) {
                            if ($key == 0) {
                                if ($result < $val['range_nilai_2']) {
                                    $keputusan = $val['id'];
                                    break;
                                }
                            } else {
                                if ($result >= $val['range_nilai_1'] && $result <= $val['range_nilai_2']) {
                                    $keputusan = $val['id'];
                                    break;
                                }
                            }
                        }
                        $model->nilai = $result;
                        $model->keputusan_id = (int) $keputusan;

                        // Hitung Nilai
                        /*
                         * perhitungan sebelum revisi (awal)
                          $jumlahPertanyaan = count($skor) * 7;
                          $skor = array_sum($skor);
                          $x_rataRataIdeal = number_format((int) $jumlahPertanyaan / 2, 2);
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
                          } */

                        $model->update();
                        // End Hitung Nilai

                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan!');
                        return $this->redirect(['/admin/formulir/view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollback();
                    Yii::$app->session->setFlash('danger', ' Data gagal disimpan!');
                    throw $e;
                }
            }

            return $this->render('create', [
                        'model' => $model,
                        'modelJadwal' => $modelJadwal,
                        'modelKriPen' => $modelKriPen,
                        'modelKomPos' => $modelKomPos,
                        'modelAskepPenilaian' => $modelAskepPenilaian
            ]);
        } else {
            Yii::$app->session->setFlash('danger', ' Data yang Anda cari tidak ditemukan atau Kandidat sudah di Wawancara!');
            return $this->redirect(['/admin/site/index']);
        }
    }

    protected function findModel($id) {
        if (($model = Formulir::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelJadwal($id) {
        if (($model = JadwalWawancara::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelCalon($id) {
        if (($model = UserCalon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelInterviewer($id) {
        if (($model = UserInterviewer::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
