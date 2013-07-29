<?php
/**
 *
 */
class newsWidget extends CWidget
{
	public function init()
	{
		//当视图中执行$this->beginWidget()时候会执行这个方法
		//可以在这里进行查询数据操作
	}

	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'id DESC' ;//排序条件
		$criteria->limit = 10;
		$criteria->offset = 0;
		$artcileList = Article::model()->findAll($criteria);
		
		$this->render('newsList',array(
				'list'=>$artcileList,
		));		
	}
}

?>