<?php

namespace app\controllers;

use app\models\Orders;
use app\models\Department;
use app\models\OrdersSearch;
use app\models\User as ModelsUser;
use app\models\Users;
use Yii;
use yii\debug\models\search\User;
use yii\web\Controller;
use yii\web\Response;
use app\models\FoodDepartment;
use yii\helpers\ArrayHelper;
use app\models\Food;

Class OrderController extends Controller{
    public function actionForm()
    {
        $userha = Users::find()->all();
        foreach ($userha as $user) {
            $userDropDown[$user->username] = $user->username;
        }
        $shobeDropDown = [];
        $shobeha = Department::find()->all();
        foreach ($shobeha as $shobe) {
            $ordersList = Orders::find()->where(['department_id' => $shobe->id])->all();
            $orderCount = count($ordersList);
            if ($shobe->quantity - $orderCount > 0) {
                $shobeDropDown[$shobe->id] = $shobe->name;
            }
        }
        $order = new Orders();
        if ($order->load(Yii::$app->request->post())) { 
            $order->save();
            return $this->refresh();
        }   
        return $this->render('form', [
            'model' => $order,
            'userDropDown' => $userDropDown,
            'shobeDropDown' => $shobeDropDown,
            ]);
    }

    public function actionSubcat() 
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $id = $parents[0];      
                $foods = [];  
                $department = Department::findOne($id);
                $departmentJunc = FoodDepartment::find()->where(['department_id' => $department->id])->all();       
                foreach ($departmentJunc as $departmentJunc) {
                    $foods[] = Food::find()->where(['id' => $departmentJunc->food_id])->one();
                    foreach ($foods as $food) {
                        $ghazaList = Orders::find()->where(['food_id' => $food->id])->all();
                        $ghazaCount = count($ghazaList);
                        if ($food->quantity - $ghazaCount > 0) {
                            $foodDropDown = $foods;
                        }
                    }                
                }
            return ['output'=>$foodDropDown, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionList()
    {
        $searchModel = new OrdersSearch();
        return $this->render('list', [
         'dataProvider' => $searchModel->search(Yii::$app->request->get()),
         'searchModel' => $searchModel
    ]);
    }

}
