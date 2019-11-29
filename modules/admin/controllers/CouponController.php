<?php

namespace app\modules\admin\controllers;

use app\models\UserCard;
use app\models\UserCoupon;
use app\modules\admin\service\CardService;
use app\modules\admin\service\CommonService;
use Yii;
use app\models\Coupon;
use app\models\CouponSearch;
use yii\base\Exception;
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
            $model->stay_num = $params['Coupon']['total_num'];
            $model->save();
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
        $version = $model->version;

        if (Yii::$app->request->isPost) {
            $params = Yii::$app->request->post();
            $model->load(Yii::$app->request->post());
            $model->suitable_age = $params['Coupon']['suitable_age_start'] . '-' . $params['Coupon']['suitable_age_end'];
            $total_num = $params['Coupon']['total_num'];
            $stay_num = $total_num - $model->already_sale_num;
            if ($stay_num < 0) {
                Yii::$app->session->setFlash('error', '库存总数不得小于已发售数目:' . $model->already_sale_num);
                return $this->redirect(['index']);
            }
            $model->stay_num = $stay_num;
            $model->total_num = $params['Coupon']['total_num'];

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->version += 1;
                $model->save();
                if ($model->version != $version + 1) {
                    throw new Exception('更新失败，表已经更新，请重新更新');
                }
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', $e->getMessage());
                return $this->redirect(['index']);
            }
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
        $user_coupon = UserCoupon::find()->where(['coupon_id' => $id])->one();
        if ($user_coupon) {
            Yii::$app->session->setFlash('error', '已有领取的优惠券，不允许删除！');
            return $this->redirect(['index']);
        }

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
