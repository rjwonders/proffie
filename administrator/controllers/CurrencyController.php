<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Currency;
use yii\helpers\Url;

class CurrencyController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Currency = Currency::find()->all();
	  	return $this->render('currency-list',["Currency" => $Currency]);
    }
	public function actionManage($CurrencyID=0) {
		AdminloginController::CheckLogin();
		
		$rsCurrency = array();
		if($CurrencyID!=0){
			$rsCurrency = Currency::findOne($CurrencyID);
		}
		
		return $this->render('add-currency',["data" => $rsCurrency]);
    }
	public function actionSavecurrency() {
		AdminloginController::CheckLogin();
		$Currency = new Currency;
		$Currency->savecurrency();
		return Yii::$app->response->redirect(Url::to(['currency/list']));
	}
	public function actionDelete($CurrencyID) {
		AdminloginController::CheckLogin();
		Currency::findOne($CurrencyID)->delete();
		return Yii::$app->response->redirect(Url::to(['currency/list']));
	}
}
