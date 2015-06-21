<?php
namespace frontend\components;

use yii;
use yii\base\Widget;
use common\models\Settings;
use yii\web\Session;

class FooterWidget extends Widget {

    public function run() {
		$Setting = new Settings;
		$Settings = $Setting->getsettings();
        return $this->render('FooterWidget',["Settings" => $Settings]);
    }
}
?>