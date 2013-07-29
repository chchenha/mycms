<?php
class UserForm extends CFormModel
{
	public $username;
	public $password;
	public $email;
	
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('username, password, email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email', 'safe', 'on'=>'search'),
			array('username','length',	'min'=>1,'max'=>60,'tooLong'=>'太长了', 'tooShort'=>'太短了'),				
			array('email', 'match','pattern'=>'/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/', 'message'=>'请输入正确的email格式'),				
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => Yii::t('adminUser','username:'),
			'password' => Yii::t('adminUser','password:'),
			'email' => Yii::t('adminUser','email:'),
		);
	}
}