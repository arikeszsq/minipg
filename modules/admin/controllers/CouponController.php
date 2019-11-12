<?php

namespace app\modules\admin\controllers;

use app\models\UserCard;
use app\models\UserCoupon;
use app\modules\admin\service\CardService;
use app\modules\admin\service\CommonService;
use Yii;
use app\models\Coupon;
use app\models\CouponSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CouponController implements the CRUD actions for Coupon model.
 */
class CouponController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Coupon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CouponSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coupon model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Coupon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coupon();

        if (Yii::$app->request->isPost) {
            $params = Yii::$app->request->post();
            $model->load(Yii::$app->request->post());
            $card = new CardService();
            $card_id = $card->getCardId($params['Coupon']['card_name']);
            $model->card_id = $card_id;
            $model->suitable_age = $params['Coupon']['suitable_age_start'] . '-' . $params['Coupon']['suitable_age_end'];
            $model->check_code = rand(10000000, 99999999);
            $common = new CommonService;
            $business_id = $common->getBusinessId($params['Coupon']['business_name']);
            $model->business_id = $business_id;

            $model->save();
            $users = UserCard::find()->where(['card_id' => $card_id])->all();
            if($users){
                foreach ($users as $user) {
                    $user_coupon = new UserCoupon();
                    $user_coupon->user_id = $user->user_id;
                    $user_coupon->username = $user->user_name;
                    $user_coupon->coupon_id = $model->id;
                    $user_coupon->coupon_name = $model->name;
                    $user_coupon->status = Coupon::Status_有效;
                    $user_coupon->total_num = $model->total_num;
                    $user_coupon->stay_num = $model->total_num;
                    $user_coupon->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Coupon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Coupon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coupon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coupon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coupon::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
