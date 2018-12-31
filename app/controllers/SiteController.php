<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TrsSuratMasuk;
use app\models\TrsSuratKeluar;
use app\modules\rekapitulasi\models\JumlahSurat;
use app\models\UserProfile;
use app\models\search\UserCalonSearch;
use app\models\search\JadwalWawancaraSearch;
use \app\models\ForgotPasswordForm;
use \app\models\User;
use \app\models\UserCalon;
use \app\models\UploadCv;
use \yii\web\UploadedFile;
use \yii\helpers\ArrayHelper;

//class SiteController extends \app\modules\log\controllers\MainController 
class SiteController extends Controller {
//    public function beforeAction($action) {
//        Yii::$app->layoutPath = '@app/themes/basic';
//        Yii::$app->layoutPath = '@app/themes/basic';
//        $this->layout = '@app/themes/basic';
//        parent::beforeAction($action);
//    }
//	public function afterAction($action, $result) {
//		if ($action->id == 'login') {
//			\app\modules\log\models\Login::saveLog($action);
//		}
//
//		return $result;
//	}

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
                //            'lang' => [
                //                'class' => 'app\components\actions\SetLocaleAction',
                //                'locales' => ['en-US', 'id-ID'],
                //            ]
        ];
    }

    public function actionLang() {
        if (isset($_GET['locale'])) {
            $language = $_GET['locale'];
            Yii::$app->language = $language;

            $languageCookie = new \yii\web\Cookie([
                'name' => 'locale',
                'value' => $language,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]);
            Yii::$app->response->cookies->add($languageCookie);
        }

        return Yii::$app->response->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
//        return $this->render('index');
        return $this->redirect('login');
        // if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('Super User')) {
        //     $searchModel = new UserCalonSearch();
        //     $dataProvider = $searchModel->searchBeranda(Yii::$app->request->queryParams);
        //     return $this->render('index', [
        //         'searchModel' => $searchModel,
        //         'dataProvider' => $dataProvider,
        //     ]);
        // } else if (Yii::$app->user->can('Interviewer')) {
        //     $searchModel = new JadwalWawancaraSearch();
        //     $dataProvider = $searchModel->searchInterviewer(Yii::$app->request->queryParams);
        //     return $this->render('index-interviewer', [
        //         'searchModel' => $searchModel,
        //         'dataProvider' => $dataProvider,
        //     ]);
        // }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
//        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user;
            if ($user->can('Super User') || $user->can('Interviewer') || $user->can('Administrator')) {
                return $this->redirect(['/admin/site/index']);
            }

            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (Yii::$app->user->can('Super User') || Yii::$app->user->can('Interviewer')) {
                return $this->redirect(['/admin/site/index']);
            }

            return $this->goBack();
        }

        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionForgotPassword() {
        $model = new ForgotPasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            if (!empty($model->getUser())) {
                $email = $model->getUser()->email;
                $resetPassword = strtolower(Yii::$app->globalFunction->generateRandomString(8));
                $model->setPassword($resetPassword);
                $updatePassword = Yii::$app->db->createCommand('UPDATE user SET `password_hash`=:password, `password_default`=:password_default WHERE email=:email')->bindValues([':password' => $model->password_hash, ':password_default' => $resetPassword, ':email' => $email]);

                // Send Email
                $params = [
                    'email' => $email,
                    'password' => $resetPassword,
                ];

                $mailer = Yii::$app->mailer->compose('@app/mail/user/reset-password', ['params' => $params])
                        ->setFrom(Yii::$app->params['noReplyEmail'])
                        ->setTo($email)
                        ->setSubject('Informasi Pembuatan Akun Anda - ' . Yii::$app->name);
                // End Send Email

                if ($updatePassword->execute() && $mailer->send()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Silahkan cek email Anda');
                    Yii::$app->session['is-reset-password'] = true;

                    return $this->render('forgot-password', [
                                'model' => $model
                    ]);
                }
            }
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', 'Akun anda tidak ditemukan');
        }

        Yii::$app->session['is-reset-password'] = false;
        return $this->render('forgot-password', [
                    'model' => $model
        ]);
    }

    public function actionApplyLamaran() {
        $model = new UserCalon();
        $modelUploadCv = new UploadCv();
        $model->status = 2;
        $postdata = Yii::$app->request->post();
        $queryJabatans = Yii::$app->db->createCommand('SELECT * FROM jabatan WHERE is_active=1 && is_apply=1')->queryAll();
        $jabatans = ArrayHelper::map($queryJabatans, 'id', 'nama');

        if ($model->load($postdata) && $model->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $modelUploadCv->fileCv = UploadedFile::getInstance($modelUploadCv, 'fileCv');

                /* Check usia */
                $dateNow = date('Y-m-d');
                $tanggalLahr = $model->tanggal_lahir;
                $usia = Yii::$app->globalFunction->dateDifference($dateNow, $tanggalLahr, '%y');
                if (($usia <= 25) || ($usia >= 45)) {
                    Yii::$app->session->setFlash('danger', ' Cek tanggal lahir Anda!. Batas usia minimal 25 dan maksimal 45');
                    return $this->render('apply-lamaran', [
                                'model' => $model,
                                'modelUploadCv' => $modelUploadCv,
                                'jabatans' => $jabatans
                    ]);
                }

                $jabatanApply = Yii::$app->db->createCommand('SELECT nama FROM jabatan WHERE id = :id')->bindValue(':id', $model->jabatan_yang_dilamar)->queryScalar();

                if ($modelUploadCv->upload($jabatanApply, $model->nama_calon)) {
                    // if file is uploaded successfully
                    $model->cv = $modelUploadCv->filename;
                    $model->usia = $usia;

                    // Send Email
                    $params = [
                        'nama' => $model->nama_calon,
                        'usia' => $model->usia,
                        'pendidikan' => $model->pendidikan,
                        'jabatan' => $model->jabatan_yang_dilamar,
                        'no_telp' => $model->phone,
                        'cv' => $model->cv
                    ];

                    $mailer = Yii::$app->mailer->compose('@app/mail/user/notif-apply-pelamar', ['params' => $params])
                            ->setFrom(Yii::$app->params['noReplyEmail'])
                            ->setTo($model->email)
                            ->setSubject('Informasi Data yang Anda masukkan - ' . Yii::$app->name);
                    // End Send Email

                    if ($mailer->send() && $model->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', ' Data telah disimpan! Silahkan cek email Anda');
                        return $this->redirect(['index']);
                    } else {
                        if (!empty($model->cv) && file_exists($model->cv)) {
                            unlink($model->cv);
                        }
                    }
                }
            } catch (Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        }

        return $this->render('apply-lamaran', [
                    'model' => $model,
                    'modelUploadCv' => $modelUploadCv,
                    'jabatans' => $jabatans
        ]);
    }

    //    public function actionFlushCache() {
    //        Yii::$app->cache->flush();
    //        Yii::$app->session->setFlash('success', Yii::t('app', 'Cache flushed'));
    //        return $this->redirect(Yii::$app->request->referrer);
    //    }

    public function siteError() {
        return $this->render('error');
    }

}
