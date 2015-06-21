<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Admin;
use administrator\controllers\AdminloginController;

class DashboardController extends Controller
{
	public $enableCsrfValidation = false;
	public function actionIndex()
    {
		AdminloginController::CheckLogin();
		return $this->render('dashboard');
    }
}
