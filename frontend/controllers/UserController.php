<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\extensions\facebook\facebook;
use yii\web\UrlManager;
use yii\helpers\Url;

use common\models\Users;
use common\models\Country;
/**
 * Site controller
 */
class UserController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionFblogin(){
    	$facebook = new Facebook(array(
		  'appId'  => Yii::$app->params['fbappid'],
		  'secret' => Yii::$app->params['fbappsecret'],
		));
		$params = array(
		  'scope' => 'email, read_stream',
		  'redirect_uri' => Yii::$app->urlManager->createAbsoluteUrl(["user/fbloginaccept"])
		);
		$loginUrl = $facebook->getLoginUrl($params);
		$this->redirect($loginUrl);
    }
	public function actionFbloginaccept(){
		$facebook = new Facebook(array(
		  'appId'  => Yii::$app->params['fbappid'],
		  'secret' => Yii::$app->params['fbappsecret'],
		));
		$user = $facebook->getUser();
		if ($user) {
			try {
				$user_profile = $facebook->api('/me');
				$Users = new Users;
				$MsgCode = $Users->saveFbLogin($user_profile);
				if($MsgCode==0):
					return Yii::$app->response->redirect(Url::to(['user/dashboard']));	
				elseif($MsgCode==2):
					return Yii::$app->response->redirect(Url::to(['user/setemail']));	
				else:
					return Yii::$app->response->redirect(Url::to(['/']));
				endif;
		  	} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
		  	}
		}
	}
    public function actionSignup(){
		$Users = new Users;
		echo $MsgCode = $Users->saveusers();
	}
	public function actionLogin(){
		$Users = new Users;
		echo $MsgCode = $Users->logins();
	}
	public function actionDashboard(){
		$rsUser = Users::findOne(Yii::$app->session['UserID']);
		$rsCountry = Country::findAll(['Status' => 1]);
		return $this->render('dashboard',['rsUser' => $rsUser, 'rsCountry' => $rsCountry]);
	}
	public function actionSaveprofile(){
		$Users = new Users;
		echo $MsgCode = $Users->saveProfile();
		return Yii::$app->response->redirect(Url::to(['user/dashboard']));
	}
	public function actionAccountsetting(){
		$rsUser = Users::findOne(Yii::$app->session['UserID']);
		return $this->render('account-setting',['rsUser' => $rsUser]);
	}
	public function actionEmailsetting(){
		$rsUser = Users::findOne(Yii::$app->session['UserID']);
		return $this->render('email-setting',['rsUser' => $rsUser]);
	}
}
