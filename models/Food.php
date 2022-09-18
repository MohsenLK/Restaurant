<?php

namespace app\models;

use Codeception\Attribute\Depends;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\app\NewController;

class Food extends ActiveRecord
{
    public static function tableName()
    {
        return 'food';
    }
    public function rules()
    {
        return [    
            [['name', 'type', 'contents', 'recipe'], 'string'],
            [['quantity'], 'integer'],
            [['quantity'], 'required']
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'نام',
            'type' => 'نوع',
            'contents' => 'محتویات',
            'recipe' => 'نحوه ساخت',
            'quantity' => 'تعداد'
        ];
    }
    public function getFoods()
    {
        return $this->hasMany(FoodDepartment::class, ['food_id' => 'id']);
    }
    
    public function getDepartments() {
            return $this->hasMany(Department::class, ['id' => 'department_id'])
                        ->via('foods');
        }

    }