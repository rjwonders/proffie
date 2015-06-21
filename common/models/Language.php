<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Language extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{languages}}';
	}
	
	public function savelanguage(){
		$request = Yii::$app->request;
		if($request->post( 'LanguageID' )){
			$Adm = Language::findOne($request->post( 'LanguageID' ));
			$Adm->LanguageID = $request->post( 'LanguageID' );
			$Adm->Language = $request->post( 'Language' );
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
			
			Yii::$app->session['AdminSuccess'] = "Language has been updated successfully";
		} else {
			$Adm = Language::find()->indexBy('LanguageID')->orderBy('LanguageID DESC')->one();
			
			$NewAddID = $Adm->LanguageID + 1;
			
			$this->LanguageID = $NewAddID;
			$this->Language = $request->post( 'Language' );
			$this->Status = $request->post( 'Status' );
			$this->save();
			
			Yii::$app->session['AdminSuccess'] = "Language has been added successfully";
		}
		return 1;
	}
}
