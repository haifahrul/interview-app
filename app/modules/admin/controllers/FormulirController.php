<?php
namespace app\modules\admin\controllers;

use Yii;
use app\models\Formulir;
use app\models\search\FormulirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * created haifahrul
 */
class FormulirController extends Controller
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
        $searchModel = new FormulirSearch();
        
        if (Yii::$app->user->can('Super User') || Yii::$app->user->can('Administrator')) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } elseif (Yii::$app->user->can('Interviewer')) {
            $dataProvider = $searchModel->searchInterviewer(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Formulir::SCENARIO_KEPUTUSAN_INTERVIEWER;
        $modelKomPos = $model->formulirKompetensiPosisis;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update();

            Yii::$app->session->setFlash('success', ' Keputusan telah disimpan!');
            return $this->redirect(['index']);
        }

        $modelKriPen = Yii::$app->db->createCommand('SELECT apt.nama as aspek_penilaian_tipe, ap.nama as aspek_penilaian, fkp.kriteria_penilaian FROM formulir_kriteria_penilaian as fkp
        LEFT JOIN aspek_penilaian as ap ON ap.id = fkp.aspek_penilaian_id
        LEFT JOIN aspek_penilaian_tipe as apt ON apt.id = ap.aspek_penilaian_tipe_id
        WHERE fkp.formulir_id = :id')->bindValue('id', $id)->queryAll();

        $modelKriPen = ArrayHelper::map($modelKriPen, 'aspek_penilaian', 'kriteria_penilaian', 'aspek_penilaian_tipe');

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                    'model' => $model,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
            ]);
        } else {
            return $this->render('view', [
                    'model' => $model,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
            ]);
        }
    }

    public function actionCetak($id)
    {
        $this->layout = '@app/themes/adminlte/layouts/blank';
        $model = $this->findModel($id);
        $model->scenario = Formulir::SCENARIO_KEPUTUSAN_INTERVIEWER;
        $modelKomPos = $model->formulirKompetensiPosisis;

        $modelKriPen = Yii::$app->db->createCommand('SELECT apt.nama as aspek_penilaian_tipe, ap.nama as aspek_penilaian, fkp.kriteria_penilaian FROM formulir_kriteria_penilaian as fkp
        LEFT JOIN aspek_penilaian as ap ON ap.id = fkp.aspek_penilaian_id
        LEFT JOIN aspek_penilaian_tipe as apt ON apt.id = ap.aspek_penilaian_tipe_id
        WHERE fkp.formulir_id = :id')->bindValue('id', $id)->queryAll();

        $modelKriPen = ArrayHelper::map($modelKriPen, 'aspek_penilaian', 'kriteria_penilaian', 'aspek_penilaian_tipe');

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('cetak', [
                    'model' => $model,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
            ]);
        } else {
            return $this->render('cetak', [
                    'model' => $model,
                    'modelKriPen' => $modelKriPen,
                    'modelKomPos' => $modelKomPos,
            ]);
        }
    }

//     public function actionCreate()
//     {
//         $model = new Formulir();
//         $is_ajax = Yii::$app->request->isAjax;
//         $postdata = Yii::$app->request->post();
//         if ($model->load($postdata) && $model->validate()) {
//             $transaction = Yii::$app->db->beginTransaction();
//             try {
//                 if ($model->save()) {
//                     $transaction->commit();
//                     Yii::$app->session->setFlash('success', ' Data telah disimpan!');
//                     return $this->redirect(['index']);
//                 }
// //end if (save) 
//             } catch (Exception $e) {
//                 $transaction->rollback();
//                 throw $e;
//             }
//         }
//         if ($is_ajax) {
// //render view
//             return $this->renderAjax('create', [
//                     'model' => $model,
//             ]);
//         } else {
//             return $this->render('create', [
//                     'model' => $model,
//             ]);
//         }
//     }
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         Yii::$app->session->setFlash('success', ' Data has been saved!');
    //         return $this->redirect(['index']);
    //     } else {
    //         if (Yii::$app->request->isAjax) {
    //             return $this->renderAjax('update', [
    //                     'model' => $model,
    //             ]);
    //         } else {
    //             return $this->render('update', [
    //                     'model' => $model,
    //             ]);
    //         }
    //     }
    // }

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
//    public function actionDeleteItems()
//    {
//        $status = 0;
//        if (isset($_POST['keys'])) {
//            $keys = $_POST['keys'];
//            foreach ($keys as $key):
//
//                $model = Formulir::findOne($key);
//                if ($model->delete())
//                    $status = 1;
//                else
//                    $status = 2;
//            endforeach;
//
////$model = Formulir::findOne($keys);
////$model->delete();
////$status=3;
//        }
//// retrun nya json
//        echo Json::encode([
//            'status' => $status,
//        ]);
//    }

    protected function findModel($id)
    {
        if (Yii::$app->user->can('Super User') || Yii::$app->user->can('Administrator')) {
            $data = Formulir::findOne(['id' => $id]);
        } else {
            $data = Formulir::findOne(['id' => $id, 'interviewer_id' => Yii::$app->user->identity->userInterviewer->id]);
        }
        
        if (($model = $data) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
