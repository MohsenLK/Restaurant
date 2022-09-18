<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class FoodDepartment extends ActiveRecord
{
    public static function tableName()
    {
        return 'food_department';
    }

    public function rules()
    {
        return [    
            [['food_id', 'department_id',], 'integer'],
        ];
    }

    public function getfoods()
    {
        
        return $this->hasOne(Food::class, ['id' => 'food_id']);
    }
    public function getdepartments()
    {

        return $this->hasOne(Department::class, ['id' => 'dempartment_id']);
    }
}
