<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Food;
use app\models\FoodSearch;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Department;
use app\models\DepartmentSearch;
use app\models\DepartmentCreate;
use app\models\FoodDepartment;
use app\models\Order;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

class NewController extends Controller {
    public function actionFoodform()
    {
        $foods = new Food();
        if ($foods->load(Yii::$app->request->post())) {
            if ($foods->save()) {
                Yii::$app->getSession()->setFlash('success','غذا با موفقیت ثبت شد');
                return $this->refresh();
            }
        }
        return $this->render('food', ['model' => $foods]);
    }
    
    public function actionFoodlist() 
    {
        $searchModel = new FoodSearch();
        return $this->render('foodlist', [
         'dataProvider' => $searchModel->search(Yii::$app->request->get()),
         'searchModel' => $searchModel
    ]);
    }
    
    public function actionUpdate($id)
    {
        $updateModel = Food::findOne($id);
        if ($updateModel->load($this->request->post())) {
            $updateModel->save();
            return $this->redirect(['foodlist']);
        }
        return $this->render('foodupdate',[
            'model' => $updateModel,
        ]);
    }

}
