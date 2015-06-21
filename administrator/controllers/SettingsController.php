<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Settings;
use yii\helpers\Url;

class SettingsController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Settings = Settings::find()->all();
	  	return $this->render('settings-list',["Settings" => $Settings]);
    }
	public function actionSavesettings() {
		AdminloginController::CheckLogin();
		$Settings = new Settings;
		$Settings->savesettings();
		return Yii::$app->response->redirect(Url::to(['settings/list']));
	}
}
