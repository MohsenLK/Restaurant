<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\app\NewController;

class Users extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }
    public function rules()
    {
        return [    
            [['username'], 'string']
        ];
    }
}