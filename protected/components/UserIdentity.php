<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$usernameRecord=User::model()->findByAttributes(array('username'=>$this->username));		
		if($usernameRecord == null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else{		
			$loginRecord=User::model()->findByAttributes(array('username'=>$this->username,'password'=>$this->password));
			if($loginRecord == null)
			{
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		}
		if($this->errorCode!=self::ERROR_USERNAME_INVALID && $this->errorCode!=self::ERROR_PASSWORD_INVALID)
		{
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode;
	}
}