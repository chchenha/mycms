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
class Categorie extends CActiveRecord
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
		return 'tbl_categorie';
	}


	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryName', 'required'),
			//array('catId',"checkDate"),				
				/*
			array('categoryName', 'required'),
			array('categoryName', 'length','max'=>128),
			*/
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	/*
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
		);
	}
	*/
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;		
		/*
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	static public function getCatCn($id)
	{
		
	}
	
	static public function getcatId()
	{
		$sql = 'SELECT categoryId,categoryName FROM tbl_categorie';
		$dbconn = Yii::app()->db;		
		$command     = $dbconn->createCommand($sql);		
		$dataReader  = $command->query();
		while(($row = $dataReader->read()) !== false) {
			$rows[$row['categoryId']] = $row['categoryName'];		
		}		
		return $rows;
	}
}