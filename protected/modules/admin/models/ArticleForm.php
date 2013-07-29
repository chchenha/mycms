<?php
class ArticleForm extends CFormModel
{
	public $id;
	public $title;
	public $catId;
	public $customAttributeId;
	public $thumb;
	public $intro;
	public $content;

	
	
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
			array('id,catId,customAttributeId,thumb', 'safe'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	/*
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => Yii::t('adminUser','username:'),
			'password' => Yii::t('adminUser','password:'),
			'email' => Yii::t('adminUser','email:'),
		);
	}
	*/
}