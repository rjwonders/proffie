<?php
namespace common\models;
use yii;
use yii\web\Request;
use yii\web\Session;

class Users extends \yii\db\ActiveRecord
{
    public static function tableName(){
		return '{{users}}';
	}
	
	public function getList(){
		$Users = Users::find()->indexBy('UserID')->all();
		$MyUsers = array();
		$i= 0;
		foreach($Users as $User):
			$MyUsers[$i]['UserID'] = $User->UserID;
			$MyUsers[$i]['FirstName'] = $User->FirstName;
			$MyUsers[$i]['LastName'] = $User->LastName;
			$MyUsers[$i]['Email'] = $User->Email;
			$MyUsers[$i]['Password'] = $User->Password;
			$MyUsers[$i]['Address'] = $User->Address;
			$MyUsers[$i]['Address2'] = $User->Address2;
			$MyUsers[$i]['City'] = $User->City;
			$MyUsers[$i]['State'] = $User->State;
			$MyUsers[$i]['Country'] = $User->Country;
			$MyUsers[$i]['Zipcode'] = $User->Zipcode;
			$MyUsers[$i]['CompanyName'] = $User->CompanyName;
			$MyUsers[$i]['ProfilePic'] = $User->ProfilePic;
			$MyUsers[$i]['TimezoneID'] = $User->TimezoneID;
			$MyUsers[$i]['IsOnline'] = $User->IsOnline;
			$MyUsers[$i]['PhoneNumber'] = $User->PhoneNumber;
			$MyUsers[$i]['IsPhoneVerified'] = $User->IsPhoneVerified;
			$MyUsers[$i]['PaypalID'] = $User->PaypalID;
			$MyUsers[$i]['IsPaypalVerified'] = $User->IsPaypalVerified;
			$MyUsers[$i]['CurrentPlanID'] = $User->CurrentPlanID;
			$MyUsers[$i]['CurrencyID'] = $User->CurrencyID;
			$MyUsers[$i]['AccountTypeID'] = $User->AccountTypeID;
			$MyUsers[$i]['IsOnProfile'] = $User->IsOnProfile;
			$MyUsers[$i]['IsSubscribed'] = $User->IsSubscribed;
			$MyUsers[$i]['AccountCreated'] = $User->AccountCreated;
			$MyUsers[$i]['AccountActivated'] = $User->AccountActivated;
			$MyUsers[$i]['ActivationCode'] = $User->ActivationCode;
			$MyUsers[$i]['LastLogin'] = $User->LastLogin;
			$MyUsers[$i]['FacebookProfileID'] = $User->FacebookProfileID;
			if($User->UserType==0):
				$MyUsers[$i]['UserType'] = "Hire";
			elseif($User->UserType==1):
				$MyUsers[$i]['UserType'] = "Work";
			else:
				$MyUsers[$i]['UserType'] = "Both";
			endif;
			$MyUsers[$i]['Status'] = $User->Status;
			$i=$i+1;
		endforeach;
		return $MyUsers;
	}
	public function saveuseradmin(){
		$request = Yii::$app->request;
		if($request->post( 'UserID' )){
			$Adm = Users::findOne($request->post( 'UserID' ));
			$Adm->FirstName = $request->post( 'FirstName' );
			$Adm->LastName = $request->post( 'LastName' );
			$Adm->Email = $request->post( 'Email' );
			$Adm->Password = md5($request->post( 'Password' ));
			$Adm->Address = $request->post( 'Address' );
			$Adm->Address2 = $request->post( 'Address2' );
			$Adm->City = $request->post( 'City' );
			$Adm->State = $request->post( 'State' );
			$Adm->Country = $request->post( 'Country' );
			$Adm->Zipcode = $request->post( 'Zipcode' );
			$Adm->CompanyName = $request->post( 'CompanyName' );
			$Adm->PhoneNumber = $request->post( 'PhoneNumber' );
			$Adm->PaypalID = $request->post( 'PaypalID' );
			$Adm->CurrencyID = $request->post( 'CurrencyID' );
			$Adm->UserType = $request->post( 'UserType' );
			$Adm->AccountCreated = $request->post( 'AccountCreated' );
			$Adm->Status = $request->post( 'Status' );
			$Adm->save();
		} else {
			$Adm = Users::find()->indexBy('UserID')->orderBy('UserID DESC')->one();
			$NewAddID = $Adm->AdminID + 1;
			$this->UserID = $NewAddID;
			$this->FirstName = $request->post( 'FirstName' );
			$this->LastName = $request->post( 'LastName' );
			$this->Email = $request->post( 'Email' );
			$this->Password = md5($request->post( 'Password' ));
			$this->Address = $request->post( 'Address' );
			$this->Address2 = $request->post( 'Address2' );
			$this->City = $request->post( 'City' );
			$this->State = $request->post( 'State' );
			$this->Country = $request->post( 'Country' );
			$this->Zipcode = $request->post( 'Zipcode' );
			$this->CompanyName = $request->post( 'CompanyName' );
			$this->PhoneNumber = $request->post( 'PhoneNumber' );
			$this->PaypalID = $request->post( 'PaypalID' );
			$this->CurrencyID = $request->post( 'CurrencyID' );
			$this->UserType = $request->post( 'UserType' );
			$this->AccountCreated = $request->post( 'AccountCreated' );
			$this->Status = $request->post( 'Status' );
			$this->save();
		}
	}
	public function saveusers(){
		$request = Yii::$app->request;
		$isAvailable = Users::find("Email='".$request->post( 'Email' )."'")->one();
		if($isAvailable):
			return 0;
		else:
			$Adm = Users::find()->indexBy('UserID')->orderBy('UserID DESC')->one();
			$NewAddID = $Adm->UserID + 1;
			$this->UserID = $NewAddID;
			$this->Email = $request->post( 'Email' );
			$this->Password = md5($request->post( 'Password' ));
			$this->UserType = $request->post( 'UserType' );
			$this->AccountCreated = date("Y-m-d H:i:s");
			$this->Status = 0;
			$this->save();
			return 1;
		endif;
	}
	public function saveFbLogin($UserData){
		$isAvailable = Users::find("FacebookProfileID='".$UserData['id']."'")->one();
		if($isAvailable):
			if(trim($isAvailable->Email)==""):
				if(isset($UserData['email']) && trim($UserData['email'])!=''):
					$isAvailable->Email = $UserData['email'];
				endif;
			endif;
			$isAvailable->LastLogin = date("Y-m-d H:i:s");
			$isAvailable->save();
			Yii::$app->session['UserID'] = $isAvailable->UserID;
			Yii::$app->session['UserTypeID'] = $isAvailable->UserType;
			
			$isEmail = Users::find("FacebookProfileID='".$UserData['id']."'")->one();
			if(trim($isEmail->Email)!=""):
				return 0;
			else:
				return 2;
			endif;
		else:
			if(isset($UserData['email']) && trim($UserData['email'])!=''):
				$isEmail = Users::find("Email='".$UserData['email']."'")->one();
				if($isEmail):
					$isEmail->FacebookProfileID = $UserData['id'];
					$isEmail->LastLogin = date("Y-m-d H:i:s");
					$isEmail->save();
					
					Yii::$app->session['UserID'] = $isEmail->UserID;
					Yii::$app->session['UserTypeID'] = $isEmail->UserType;
					return 0;
				else:
					$Adm = Users::find()->indexBy('UserID')->orderBy('UserID DESC')->one();
					$NewAddID = $Adm->UserID + 1;
					$this->UserID = $NewAddID;
					$this->FirstName = $UserData['first_name'];
					$this->LastName = $UserData['last_name'];
					$this->Email = $UserData['email'];
					$this->FacebookProfileID = $UserData['id'];
					$this->UserType = 0;
					$this->Status = 1;
					$this->AccountCreated = date("Y-m-d H:i:s");
					$this->save();
					return 0;
				endif;
			else:
				$Adm = Users::find()->indexBy('UserID')->orderBy('UserID DESC')->one();
				$NewAddID = $Adm->UserID + 1;
				$this->UserID = $NewAddID;
				$this->FirstName = $UserData['first_name'];
				$this->LastName = $UserData['last_name'];
				$this->FacebookProfileID = $UserData['id'];
				$this->UserType = 0;
				$this->Status = 1;
				$this->AccountCreated = date("Y-m-d H:i:s");
				$this->save();
				return 2;
			endif;
		endif;
	}
	public function logins(){
		$request = Yii::$app->request;
		$Email = $request->post("Email");
		$Password = $request->post("Password");
		
		$Users = Users::findOne(['Email' => $Email, 'Password' => md5($Password) ]);
		if(count($Users) > 0):
			$Users->LastLogin = date("Y-m-d H:i:s");
			$Users->update();
			Yii::$app->session['UserID'] = $Users->UserID;
			Yii::$app->session['UserTypeID'] = $Users->UserType;
			return 1;
		else:
			return 0;
		endif;
	}
	public function saveProfile(){
		$request = Yii::$app->request;
		$Users = Users::findOne(Yii::$app->session['UserID']);
		$Users->FirstName = $request->post( 'FirstName' );
		$Users->LastName = $request->post( 'LastName' );
		$Users->Address = $request->post( 'Address' );
		$Users->Address2 = $request->post( 'Address2' );
		$Users->City = $request->post( 'City' );
		$Users->State = $request->post( 'State' );
		$Users->Zipcode = $request->post( 'Zipcode' );
		$Users->Country = $request->post( 'Country' );
		$Users->CompanyName = $request->post( 'CompanyName' );
		$Users->TimezoneID = $request->post( 'TimezoneID' );
		$Users->save();
	}
}
