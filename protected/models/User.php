<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}


	
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
			array('id, username, password, email', 'safe', 'on'=>'search'),
			array('username','length',	'min'=>1,'max'=>60,'tooLong'=>'太长了', 'tooShort'=>'太短了'),				
			array('email', 'match','pattern'=>'/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/', 'message'=>'请输入正确的email格式'),				
		);
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

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => Yii::t('adminUser','username:'),
			'password' => Yii::t('adminUser','password:'),
			'email' => Yii::t('adminUser','email:'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;		
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function userList()
	{
		$sql = 'SELECT * FROM tbl_user';
		$dbconn = Yii::app()->db;		
		$command     = $dbconn->createCommand($sql);		
		$dataReader  = $command->query();
		while(($row = $dataReader->read()) !== false) {
			$rows[] = $row;		
		}		
		return $rows;
	}
}