<?php

namespace app\widgets\admin\controllers;

use Yii;
use app\widgets\admin\models\Menu;
use app\widgets\admin\models\searchs\Menu as MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\widgets\admin\components\Helper;

/**
 * MenuController implements the CRUD actions for Menu model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class MenuController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MenuSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param  integer $id
     * @return mixed
     */
    public function actionView($id) {
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

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Menu;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();
            Yii::$app->session->setFlash('success', \app\messages\Text::NOTIF_SAVE);
            return $this->redirect(['index']);
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('create', [
                            'model' => $model,
                ]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->menuParent) {
            $model->parent_name = $model->menuParent->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();
            Yii::$app->session->setFlash('success', \app\messages\Text::NOTIF_SAVE);
            return $this->redirect(Yii::$app->request->referrer);
        } else {
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
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            Helper::invalidate();
            Yii::$app->session->setFlash('success', \app\messages\Text::NOTIF_SAVE);
        } else {
            Yii::$app->session->setFlash('danger', \app\messages\Text::NOTIF_SAVE_FAILED);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
