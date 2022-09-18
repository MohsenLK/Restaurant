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
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Url;
use app\models\Orders;

class DepartmentController extends Controller {

    public function actionForm()
    {
        $foodha = Food::find()->all();
            foreach ($foodha as $ghaza) {
                $foodDropDown[$ghaza->id] = $ghaza->name . '(' . $ghaza->type . ')';
            }
        $department = new Department();
          if ($department->load(Yii::$app->request->post())) { 
             $department->save();
             if (! empty($department->foodIds)) {
                 foreach($department->foodIds as $foodId) {
                    $junction = new FoodDepartment();
                    $junction->food_id = $foodId;
                    $junction->department_id = $department->id;
                    $junction->save();
                }
             }
             return $this->refresh();
            }
        return $this->render('department', [
            'model' => $department,
            'foodDropDown' => $foodDropDown
            ]);
    }   

    public function actionList()
    {
        $searchModel = new DepartmentSearch();
        return $this->render('departmentlist', [
         'dataProvider' => $searchModel->search(Yii::$app->request->get()),
         'searchModel' => $searchModel
    ]);
    }
    public function actionUpdate($id)
    {           
        $updateModel = Department::findOne($id);
        $foodDepartments = FoodDepartment::find()->where(['department_id' => $updateModel->id])->all();
        $updateModel->foodIds = ArrayHelper::getColumn($foodDepartments, 'food_id');
        $foodha = Food::find()->all();
        foreach ($foodha as $ghaza) {
            $foodDropDown[$ghaza->id] = $ghaza->name . '(' . $ghaza->type . ')';
        }
        if ($updateModel->load(Yii::$app->request->post())) { 
            $updateModel->save();
            if (! empty($updateModel->foodIds)) {
                foreach ($foodDepartments as $foodDepartment) {
                    $foodDepartment->delete();
                }
                
                foreach($updateModel->foodIds as $foodId) {
                    $junction = new FoodDepartment();
                    $junction->food_id = $foodId;
                    $junction->department_id = $updateModel->id;
                    $junction->save();
                }
                return $this->redirect(['list']);
            }
        }   
        return $this->render('departmentupdate', [
            'model' => $updateModel,
            'foodDropDown' => $foodDropDown,
        ]);
    }
    public function actionView($id)
    {
        $department = Department::findOne($id);
        $foodNames = '';
        foreach ($department->foods as $food) {
            $foodNames = $foodNames . $food->name . '<br>';
        }
 
        return $this->render ('departmentview', [
            'model' => $department,
            'foodNames' => $foodNames,
        ]);
    }
}