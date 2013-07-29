<?php
class Article extends CActiveRecord
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
		return 'tbl_article';
	}

	public static function getcustomAttributeIdCn($customAttributeId)
	{
		$customAttributeIdDefaultArr = Yii::app()->params['artcile']['customAttributeId'];
		
		$customAttributeIdArr = explode(",",$customAttributeId);
		$customAttributeIdCnArr = array();
			
		foreach($customAttributeIdArr as $customAttributeIdV)
		{
			if(isset($customAttributeIdDefaultArr[$customAttributeIdV]))
			{
				$customAttributeIdCnArr[] = $customAttributeIdDefaultArr[$customAttributeIdV];
			}else{
				$customAttributeIdCnArr[] = '无';
			}
		}
		return $customAttributeIdCnArr;		
	}

	

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,intro,content', 'required'),
			//array('catId',"checkDate"),				
			array('catId,thumb', 'safe'),
				/*
			array('categoryName', 'required'),
			array('categoryName', 'length','max'=>128),
			*/
		);
		
	}
	
	public function checkDate()
	{
		if($this->catId!=3)
		{
			$this->addError('catId','afafafd');
		}
	
		/*
			if (!preg_match ("/^\d{4}-\d{2}-\d{2}/s", $this->campaignStart)) {
		$this->addError('campaignStart',Yii::t('campaign','selectDateError'));
		}
		*/
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
			//'categoryName' => '栏目名称',
		);
	}

}