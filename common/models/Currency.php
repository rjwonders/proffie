<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Currency extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{currency}}';
	}
	
	public function savecurrency(){
		$request = Yii::$app->request;
		if($request->post( 'CurrencyID' )){
			$Adm = Currency::findOne($request->post( 'CurrencyID' ));
			$Adm->CurrencyID = $request->post( 'CurrencyID' );
			$Adm->Currency = $request->post( 'Currency' );
			$Adm->CurrencyPrefix = $request->post( 'CurrencyPrefix' );
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
			
			Yii::$app->session['AdminSuccess'] = "Currency has been updated successfully";
		} else {
			$Adm = Currency::find()->indexBy('CurrencyID')->orderBy('CurrencyID DESC')->one();
			
			$NewAddID = $Adm->CurrencyID + 1;
			
			$this->CurrencyID = $NewAddID;
			$this->Currency = $request->post( 'Currency' );
			$this->CurrencyPrefix = $request->post( 'CurrencyPrefix' );
			$this->Status = $request->post( 'Status' );
			$this->save();
			
			Yii::$app->session['AdminSuccess'] = "Currency has been added successfully";
		}
		return 1;
	}
}
