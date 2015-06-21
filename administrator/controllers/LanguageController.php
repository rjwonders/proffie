<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Language;
use yii\helpers\Url;

class LanguageController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Language = Language::find()->all();
	  	return $this->render('language-list',["Language" => $Language]);
    }
	public function actionManage($LanguageID=0) {
		AdminloginController::CheckLogin();
		
		$rsLanguage = array();
		if($LanguageID!=0){
			$rsLanguage = Language::findOne($LanguageID);
		}
		
		return $this->render('add-language',["data" => $rsLanguage]);
    }
	public function actionSavelanguage() {
		AdminloginController::CheckLogin();
		$Language = new Language;
		$Language->savelanguage();
		return Yii::$app->response->redirect(Url::to(['language/list']));
	}
	public function actionDelete($LanguageID) {
		AdminloginController::CheckLogin();
		Language::findOne($LanguageID)->delete();
		return Yii::$app->response->redirect(Url::to(['language/list']));
	}
}
