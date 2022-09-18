<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\app\NewController;

class Department extends ActiveRecord
{
    public $foodIds;
    
    public static function tableName()
    {
        return 'department';
    }
    
    public function rules()
    {
        return [    
            [['name', 'adress',], 'string'],
            [['foodIds'], 'safe'],
            [['quantity'], 'integer'],
            [['quantity'], 'required']
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'نام',
            'adress' => 'آدرس',
            'food_list' => 'لیست غذاها',
            'quantity' => 'تعداد',
            'foodIds' => 'نوع غذا'
        ];
    }
    
    public function getDepartments()
    {
        return $this->hasMany(FoodDepartment::class, ['department_id' => 'id']);
    }
    
    public function getFoods()
    {
        return $this->hasMany(Food::class, ['id' => 'food_id'])
            ->via('departments');
    }
   
}