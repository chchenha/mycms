<?php
class CategorieForm extends CFormModel
{
	public $categoryName;
	public $categoryParentId;
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryName', 'required'),
			array('categoryName', 'length','max'=>128),
		);
		
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(				
			'categoryName' => '栏目名称',
		);
	}
}