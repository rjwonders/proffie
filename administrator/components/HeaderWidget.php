<?php
namespace administrator\components;

use yii;
use yii\base\Widget;
use common\models\Admin;
use yii\web\Session;

class HeaderWidget extends Widget {

    public function run() {
		$Admin = Admin::findOne(Yii::$app->session['AdminID']);
        return $this->render('HeaderWidget', array(
            'admins'=>$Admin   
        ));
    }
}
?>