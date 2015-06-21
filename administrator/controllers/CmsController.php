<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Cms;
use yii\helpers\Url;

class CmsController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Cms = Cms::find()->all();
	  	return $this->render('cms-list',["Cms" => $Cms]);
    }
	public function actionManage($CMSID=0) {
		AdminloginController::CheckLogin();
		
		$rsCms = array();
		if($CMSID!=0){
			$rsCms = Cms::findOne($CMSID);
		}
		
		return $this->render('add-cms',["data" => $rsCms]);
    }
	public function actionSavecms() {
		AdminloginController::CheckLogin();
		$Cms = new Cms;
		$Cms->savecms();
		return Yii::$app->response->redirect(Url::to(['cms/list']));
	}
	public function actionDelete($CMSID) {
		AdminloginController::CheckLogin();
		Cms::findOne($CMSID)->delete();
		return Yii::$app->response->redirect(Url::to(['cms/list']));
	}
}
