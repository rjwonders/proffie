<?php
namespace frontend\components;

use yii;
use yii\base\Widget;
use common\models\Admin;
use yii\web\Session;

class FaqWidget extends Widget {

    public function run() {
		//$Admin = Admin::findOne(Yii::$app->session['AdminID']);
        return $this->render('FaqWidget');
    }
}
?>