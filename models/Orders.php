<?php

namespace app\models;

use Codeception\Attribute\Depends;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\app\NewController;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
    public function rules()
    {
        return [    
            [['user', 'adress'], 'string'],
            [['department_id', 'food_id'], 'integer'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'user' => 'نام کاربر',
            'adress' => 'آدرس ارسال',
            'department_id' => 'لیست شعبه',
            'food_id' => 'لیست غذا'
        ];
    }
    public function getDepartments()
    {
          return $this->hasOne(Department::class, ['id' => 'department_id']);
    }
    public function getUserFoods()
    {
          return $this->hasOne(Food::class, ['id' => 'food_id']);
    }

}