<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Admintype extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{admintype}}';
	}
}
