<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Users;
use common\models\Country;
use common\models\Currency;
use yii\helpers\Url;

class UserController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Users = new Users;
		$User = $Users->getList();
	  	return $this->render('user-list',["data" => $User]);
    }
	public function actionManage($UserID=0) {
		AdminloginController::CheckLogin();
		
		$rsUser = array();
		if($UserID!=0){
			$rsUser = Users::findOne($UserID);
		}
		$rsCountry = Country::find()->indexBy('CountryID')->all();
		$rsCurrency = Currency::find()->indexBy('CurrencyID')->all();
		return $this->render('add-user',["data" => $rsUser, "country" => $rsCountry, "currency" => $rsCurrency]);
    }
	public function actionSaveuser() {
		AdminloginController::CheckLogin();
		$Users = new Users;
		$Users->saveuseradmin();
		return Yii::$app->response->redirect(Url::to(['user/list']));
	}
	public function actionDelete($UserID) {
		AdminloginController::CheckLogin();
		Users::findOne($UserID)->delete();
		return Yii::$app->response->redirect(Url::to(['user/list']));
	}
}
