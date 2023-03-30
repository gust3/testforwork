<?php

namespace app\controllers;

use app\models\Subscriptions;
use app\models\SubscriptionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SubscriptionsController implements the CRUD actions for Subscriptions model.
 */
class SubscriptionsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Subscriptions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SubscriptionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $events = ArrayHelper::map(\app\models\Events::find()->all(), 'id', 'name');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'events' => $events
        ]);
    }

    /**
     * Displays a single Subscriptions model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $events = ArrayHelper::map(\app\models\Events::find()->all(), 'id', 'name');
        return $this->render('view', [
            'model' => $this->findModel($id),
            'events' => $events
        ]);
    }

    /**
     * Creates a new Subscriptions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Subscriptions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->updated = time();
                $model->created = time();
                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        $events = ArrayHelper::map(\app\models\Events::find()->asArray()->all(), 'id', 'name');
        return $this->render('create', [
            'model' => $model,
            'events' => $events
        ]);
    }

    /**
     * Updates an existing Subscriptions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated = time();
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $events = ArrayHelper::map(\app\models\Events::find()->asArray()->all(), 'id', 'name');
        return $this->render('update', [
            'model' => $model,
            'events' => $events
        ]);
    }

    /**
     * Deletes an existing Subscriptions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subscriptions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Subscriptions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subscriptions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
