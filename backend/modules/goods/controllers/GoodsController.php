<?php

namespace app\modules\goods\controllers;


use Yii;
use backend\modules\goods\models\Goods;
use backend\modules\goods\models\GoodsSearch;
use app\components\CommonController;
use app\components\libs\Common;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class GoodsController extends CommonController
{

    /**
     * Lists all Orders models.
     * @return mixed
     */
    //托服订单列表
    public function actionIndex($status = 0)
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('/view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        $data = Yii::$app->request->post();

        if ($data) {
            $listImgFile = Common::uploadFile('Goods[list_pic]');
            if($listImgFile) $data['Goods']['list_pic'] = $listImgFile['path'];

            if($model->load($data) && $model->save())
            {
                Yii::$app->session->setFlash('success', ['delay'=>3000,'message'=>'保存成功！']);
                return $this->redirect(['index']);
            }

            Yii::$app->session->setFlash('error', ['delay'=>3000,'message'=>'保存失败！']);

        }
        return $this->render('/create', [
            'model' => $model,
        ]);

    }


    /**
     * 发货
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data = Yii::$app->request->post();
        if($data)
        {
            $listImgFile = Common::uploadFile('Goods[list_pic]');
            $data['Goods']['list_pic'] = $model->list_pic;
            if($listImgFile)
            {
                $data['Goods']['list_pic'] = $listImgFile['path'];
                @unlink(\Yii::getAlias('@upPath') . '/' . $model->list_pic);
            }

            if($model->load($data) && $model->save())
            {
                Yii::$app->session->setFlash('success', ['delay'=>3000,'message'=>'保存成功！']);
                return $this->redirect(['/goods/goods/view', 'id' => $model->id]);
            }
            else{
                Yii::$app->session->setFlash('error', ['delay'=>3000,'message'=>'保存失败！']);
            }
        }

        return $this->render('/update',['model' => $model]);
    }


    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
