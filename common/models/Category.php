<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{category}}';
	}
	
	public function getList(){
		$Admin = Category::find()->indexBy('CategoryID')->all();
		$MyCategory = array();
		$i= 0;
		foreach($Admin as $Adms):
			$MyCategory[$i]['CategoryID'] = $Adms->CategoryID;
			$MyCategory[$i]['Category'] = $Adms->Category;
			$MyCategory[$i]['Status'] = $Adms->Status;
			
			$TheCat = Category::find()->where(['CategoryID' => $Adms->ParentCategoryID])->one();
			$MyCategory[$i]['ParentCategory'] = $TheCat->Category;
			$i=$i+1;
		endforeach;
		return $MyCategory;
	}
	
	public function savecategory(){
		$request = Yii::$app->request;
		if($request->post( 'CategoryID' )){
			$Adm = Category::findOne($request->post( 'CategoryID' ));
			$Adm->CategoryID = $request->post( 'CategoryID' );
			$Adm->Category = $request->post( 'Category' );
			$Adm->ParentCategoryID = $request->post( 'ParentCategoryID' );
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
			
			Yii::$app->session['AdminSuccess'] = "Category has been updated successfully";
		} else {
			$Adm = Category::find()->indexBy('CategoryID')->orderBy('CategoryID DESC')->one();
			
			$NewAddID = $Adm->CategoryID + 1;
			
			$this->CategoryID = $NewAddID;
			$this->Category = $request->post( 'Category' );
			$this->ParentCategoryID = $request->post( 'ParentCategoryID' );
			$this->Status = $request->post( 'Status' );
			$this->save();
			
			Yii::$app->session['AdminSuccess'] = "Category has been added successfully";
		}
		return 1;
	}
}
