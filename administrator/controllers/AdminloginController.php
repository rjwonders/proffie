<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Admin;
use yii\helpers\Url;

class AdminloginController extends Controller
{
	public $enableCsrfValidation = false;
	public static function CheckLogin(){
		if(!isset(Yii::$app->session['AdminID'])){
			return Yii::$app->response->redirect(Url::to(['/']));	
			//return $this->goHome();
		}
	}
	public static function CheckLogedin(){
		if(isset(Yii::$app->session['AdminID'])){
			return Yii::$app->response->redirect(Url::to(['dashboard/index']));	
		}
	}
	public function actionIndex()
    {
		$this->CheckLogedin();
	  	return $this->render('login');
    }
	
	public function actionLogin()
    {
		$model = new Admin();
	   	$Response = $model->checkLogin();
		if($Response==1):
			$this->redirect(Url::to(['dashboard/index']));
		else:
			$this->goBack();
		endif;
	}
	public function actionLogout()
    {
		unset(Yii::$app->session['AdminID']);
		unset(Yii::$app->session['UserTypeID']);
		$this->goHome();
	}
}
