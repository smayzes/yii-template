<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $user_token
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $cts
 * @property string $mts
 * @property string $status
 *
 * The followings are the available model relations:
 * @property AlbumAccess[] $albumAccesses
 */
class Users extends CActiveRecord {
    public $repeat_password;

    const STATUS_HIDDEN     = '.';
    const STATUS_ACTIVE     = '+';
    const STATUS_DELETED    = '-';
    const STATUS_PENDING	= '?';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/*public function defaultScope() {
        return array(
			'condition'=>'status=:status',
			'params'=>array(':status'=>self::STATUS_ACTIVE),
        );
    }*/

	public function email($email = null) {
		if ( !empty($email) ) {
	        $this->getDbCriteria()->mergeWith(array(
            	'condition'=>'email=:email',
            	'params'=>array(':email'=>strtolower($email)),
			));
		}
		return $this;
    }

	/**
	* behaviors function.
	*
	* Returns a list of behaviors that this model should behave as.
	*
	* @access public
	* @return void
	*/
	public function behaviors() {
		// CTimestampBehavior will automatically fill date and time related attributes.
	    return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'cts',
				'updateAttribute' => 'mts',
				'setUpdateOnCreate'=> true,
			),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('password, repeat_password', 'required', 'on'=>'insert'),
            array('password, repeat_password', 'length', 'min'=>6, 'max'=>255),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),
			array('email', 'required'),
			array('email','email'),
			array('email, password, first_name, last_name', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_token, email, password, first_name, last_name, cts, mts, status', 'safe', 'on'=>'search'),
		);
	}

	public function beforeSave() {
		if ( $this->isNewRecord ) {
			$hasher = new PasswordHash(8, TRUE);
			$this->setAttribute('password', $hasher->HashPassword($this->password));
		}
		if ( !empty($this->email) )
			$this->email = strtolower($this->email);
        return parent::beforeSave();
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_token' => 'User Token',
			'email' => 'Email',
			'repeat_password' => 'Repeat Password',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'cts' => 'Cts',
			'mts' => 'Mts',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_token',$this->user_token,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('cts',$this->cts,true);
		$criteria->compare('mts',$this->mts,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}