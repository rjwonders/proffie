<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Cms extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{cms}}';
	}
	
	public function savecms(){
		$request = Yii::$app->request;
		if($request->post( 'CMSID' )){
			$Adm = Cms::findOne($request->post( 'CMSID' ));
			$Adm->CMSID = $request->post( 'CMSID' );
			$Adm->PageName = $request->post( 'PageName' );
			$Adm->Content = $request->post( 'Content' );
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
			
			Yii::$app->session['AdminSuccess'] = "CMS page has been updated successfully";
		} else {
			$Adm = Cms::find()->indexBy('CMSID')->orderBy('CMSID DESC')->one();
			
			$NewAddID = $Adm->CMSID + 1;
			
			$this->CMSID = $NewAddID;
			$this->PageName = $request->post( 'PageName' );
			$this->Content = $request->post( 'Content' );
			$this->Status = $request->post( 'Status' );
			$this->save();
			
			Yii::$app->session['AdminSuccess'] = "CMS page has been added successfully";
		}
		return 1;
	}
}
