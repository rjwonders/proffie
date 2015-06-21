<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Admin;
use common\models\Admintype;
use yii\helpers\Url;

class AdminController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Admins = new Admin;
		$Admin = $Admins->getList();
	  	return $this->render('admin-list',["data" => $Admin]);
    }
	public function actionManage($AdminID=0) {
		AdminloginController::CheckLogin();
		
		$rsAdmin = array();
		if($AdminID!=0){
			$rsAdmin = Admin::findOne($AdminID);
		}
		
		$rsUserType = Admintype::find()->indexBy('AdminType')->all();
		
		return $this->render('add-admin',["data" => $rsAdmin, "usertype" => $rsUserType]);
    }
	public function actionSaveadmin() {
		AdminloginController::CheckLogin();
		$Admins = new Admin;
		$Admins->saveadmin();
		if(Yii::$app->session['UserTypeID']==1):
			return Yii::$app->response->redirect(Url::to(['admin/list']));
		else:
			return Yii::$app->response->redirect(Url::to(['admin/manage', "AdminID" => Yii::$app->session['AdminID']]));
		endif;
	}
	public function actionDelete($AdminID) {
		AdminloginController::CheckLogin();
		Admin::findOne($AdminID)->delete();
		return Yii::$app->response->redirect(Url::to(['admin/list']));
	}
}
