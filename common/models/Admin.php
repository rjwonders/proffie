<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;
use common\models\Admintype;

class Admin extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{admin}}';
	}
	
	public function checkLogin(){
		$request = Yii::$app->request;
		$Email = $request->post("Email");
		$Password = $request->post("Password");
		
		$Admin = Admin::findOne(['Email' => $Email, 'Password' => md5($Password) ]);
		if(count($Admin) > 0):
			$Admin->LastLogin = date("Y-m-d H:i:s");
			$Admin->update();
			Yii::$app->session['AdminID'] = $Admin->AdminID;
			Yii::$app->session['UserTypeID'] = $Admin->AdminType;
			return 1;
		else:
			Yii::$app->session['AdminError'] = "Invalid Email or Password.";
			return 0;
		endif;
	}
	
	public function getList(){
		$Admin = Admin::find()->indexBy('AdminID')->all();
		$MyAdmins = array();
		$i= 0;
		foreach($Admin as $Adms):
			$MyAdmins[$i]['AdminID'] = $Adms->AdminID;
			$MyAdmins[$i]['FirstName'] = $Adms->FirstName;
			$MyAdmins[$i]['LastName'] = $Adms->LastName;
			$MyAdmins[$i]['Email'] = $Adms->Email;
			$MyAdmins[$i]['AdminType'] = $Adms->AdminType;
			$MyAdmins[$i]['LastLogin'] = $Adms->LastLogin;
			$MyAdmins[$i]['Status'] = $Adms->Status;
			
			$UType = Admintype::findOne($Adms->AdminType);
			$MyAdmins[$i]['UserType'] = $UType->AdminType;
			
			
			$i=$i+1;
		endforeach;
		return $MyAdmins;
	}
	
	public function saveadmin(){
		$request = Yii::$app->request;
		if($request->post( 'AdminID' )){
			$Adm = Admin::findOne($request->post( 'AdminID' ));
			$Adm->AdminID = $request->post( 'AdminID' );
			$Adm->FirstName = $request->post( 'FirstName' );
			$Adm->LastName = $request->post( 'LastName' );
			$Adm->Email = $request->post( 'Email' );
			if(trim($request->post( 'Password' ))!=''):
				$Adm->Password = md5($request->post( 'Password' ));
			endif;
			if(trim($request->post( 'UserTypeID' ))!=''):
				$Adm->AdminType = $request->post( 'UserTypeID' );
			endif;
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
			
			Yii::$app->session['AdminSuccess'] = "Admin has been updated successfully";
		} else {
			$Adm = Admin::find()->indexBy('AdminID')->orderBy('AdminID DESC')->one();
			
			$NewAddID = $Adm->AdminID + 1;
			
			$this->AdminID = $NewAddID;
			$this->FirstName = $request->post( 'FirstName' );
			$this->LastName = $request->post( 'LastName' );
			$this->Email = $request->post( 'Email' );
			$this->Password = md5($request->post( 'Password' ));
			$this->Status = $request->post( 'Status' );
			if(trim($request->post( 'UserTypeID' ))!=''):
				$this->AdminType = $request->post( 'UserTypeID' );
			endif;
			$this->save();
			
			Yii::$app->session['AdminSuccess'] = "Admin has been added successfully";
		}
		return 1;
	}
}
