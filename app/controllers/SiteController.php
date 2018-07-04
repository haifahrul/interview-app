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

//class SiteController extends \app\modules\log\controllers\MainController 
class SiteController extends Controller
{
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
    public function behaviors()
    {
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
    public function actions()
    {
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

    public function actionLang()
    {
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
    public function actionIndex()
    {
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('Super User')) {
            $searchModel = new UserCalonSearch();
            $dataProvider = $searchModel->searchBeranda(Yii::$app->request->queryParams);

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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
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
    public function actionAbout()
    {
        return $this->render('about');
    }
    //    public function actionFlushCache() {
    //        Yii::$app->cache->flush();
    //        Yii::$app->session->setFlash('success', Yii::t('app', 'Cache flushed'));
    //        return $this->redirect(Yii::$app->request->referrer);
    //    }
//    public function siteError() {
//        return $this->render('error');
//    }
}