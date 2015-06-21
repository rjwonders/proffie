<?php
namespace frontend\components;

use yii;
use yii\base\Widget;
use common\models\Admin;
use yii\web\Session;
use common\models\Users;

class HeaderWidget extends Widget {

    public function run() {
		$rsUser = array();
		if(isset(Yii::$app->session['UserID'])):
			$rsUser = Users::findOne(Yii::$app->session['UserID']);
		endif;
		//$Admin = Admin::findOne(Yii::$app->session['AdminID']);
        return $this->render('HeaderWidget',["rsUser"=> $rsUser]);
    }
}
?>