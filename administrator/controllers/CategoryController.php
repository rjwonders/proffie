<?php
namespace administrator\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use yii\helpers\Url;

class CategoryController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionList() {
		AdminloginController::CheckLogin();
		$Categories = new Category;
		$Category = $Categories->getList();
	  	return $this->render('category-list',["Category" => $Category]);
    }
	public function actionManage($CategoryID=0) {
		AdminloginController::CheckLogin();
		
		$rsCategory = array();
		if($CategoryID!=0){
			$rsCategory = Category::findOne($CategoryID);
			$Categories = Category::find()->where("Status=1 AND CategoryID!=".$CategoryID)->all();
		} else {
			$Categories = Category::findAll(["Status"=>1]);
		}
		return $this->render('add-category',["data" => $rsCategory, "Categories" => $Categories]);
    }
	public function actionSavecategory() {
		AdminloginController::CheckLogin();
		$Category = new Category;
		$Category->savecategory();
		return Yii::$app->response->redirect(Url::to(['category/list']));
	}
	public function actionDelete($CategoryID) {
		AdminloginController::CheckLogin();
		Category::findOne($CategoryID)->delete();
		return Yii::$app->response->redirect(Url::to(['category/list']));
	}
}
