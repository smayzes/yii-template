<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;

	/**
	 * Authenticates a user against the database records.
	 *
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$model = Users::model()->email($this->username)->find();
		$hasher = new PasswordHash(8, TRUE);
		if ( $model === null ) {
		//  No user found
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if ( !$hasher->CheckPassword($this->password, $model->password) ) {
		//  Invalid password
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else {
			$this->errorCode=self::ERROR_NONE;
			$this->setState('email', $model->email);
			$this->_id = $model->user_token;
		}
		return !$this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}
}