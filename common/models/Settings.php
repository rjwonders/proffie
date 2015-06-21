<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Settings extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{settings}}';
	}
	
	public function savesettings(){
		foreach($_POST['MySetting'] as $Setts=>$value):
			$Adm = Settings::findOne($Setts);
			$Adm->SettingValue = $value;
			$Adm->save();
		endforeach;
		Yii::$app->session['AdminSuccess'] = "Settings has been added successfully";
		return 1;
	}
	public function getsettings(){
		$Data = Settings::find()->indexBy('SettingID')->all();
		$MySettings = array();
		foreach($Data as $MData):
			$MySettings[$MData->SettingName] = $MData->SettingValue;
		endforeach;
		return $MySettings;
	}
}
