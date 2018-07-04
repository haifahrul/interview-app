<?php
namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserInterviewer;
use app\models\search\UserInterviewerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\modules\userManagement\models\AuthAssignment;

/**
 * created haifahrul
 */
class UserInterviewerController extends Controller
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
        $searchModel = new UserInterviewerSearch();
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

    public function actionCreate()
    {
        $model = new UserInterviewer();
        $modelUser = new User();
        $modelUser->scenario = 'createInterviewer';
        $is_ajax = Yii::$app->request->isAjax;
        $postdata = Yii::$app->request->post();
        
        if (($model->load($postdata) && $model->validate()) && $modelUser->load($postdata)) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $modelUser->username = $modelUser->email;
                $passwordDefault = strtolower(Yii::$app->globalFunction->generateRandomString(6));
                $modelUser->setPassword($passwordDefault);
                $modelUser->password_default = $passwordDefault;

                // Send Email
                $params = [
                    'nama' => $model->nama_pewawancara,
                    'email' => $modelUser->email,
                    'password' => $passwordDefault,
                ];
                
                $mailer = Yii::$app->mailer->compose('@app/mail/user/information-account', ['params' => $params])
                    ->setFrom('mailer@afsyah.com')
                    ->setTo($modelUser->email)
                    ->setSubject('Informasi Pembuatan Akun Anda - Yarsi Formulir');
                // End Send Email

                if ($modelUser->validate() && $modelUser->save()) {                    
                    $model->user_id = $modelUser->id;

                    // Set Role Access
                    $authAssignment = new AuthAssignment([
                        'user_id' => $modelUser->id,
                        'item_name' => 'Interviewer',
                        'created_at' => time()
                    ]);

                    if ($model->save() && $mailer->send() && $authAssignment->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan dan informasi akun telah dikirim ke email ' . $modelUser->email);
                        return $this->redirect(['index']);
                    }
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
                    'modelUser' => $modelUser,
            ]);
        } else {
            return $this->render('create', [
                    'model' => $model,
                    'modelUser' => $modelUser,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', ' Data has been saved!');
            return $this->redirect(['index']);
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('update', [
                        'model' => $model,
                        'modelUser' => $modelUser,
                ]);
            } else {
                return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser,
                ]);
            }
        }
    }

    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);
            if ($model->delete() && $this->findModelUser($model->user_id)->delete()):
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

                $model = UserInterviewer::findOne($key);
                if ($model->delete())
                    $status = 1;
                else
                    $status = 2;
            endforeach;

//$model = UserInterviewer::findOne($keys);
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
        if (($model = UserInterviewer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelUser($userId)
    {
        if (($model = User::findOne($userId)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}