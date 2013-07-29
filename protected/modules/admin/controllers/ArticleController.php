<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','index','view','getAjaxImg'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{			
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function getFlodedate()
	{
		$year = substr(date("Y"),2,2);
		$month = date("m");
		$day = date("d");
		$flode = IMG_UPLOAD.$year.$month.$day;
		
		if(!is_dir($flode))
		{
			mkdir($flode, 0755);		
		}
		return $year.$month.$day;
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{		
		$articleFrom = new ArticleForm;
		$articleModel = new Article;
		
		$image=CUploadedFile::getInstanceByName('thumb');
		
		//插入
		if(isset($_POST['ArticleForm']))
		{			
			if(!empty($_POST['ArticleForm']['customAttributeId']))
			{
				$articleModel->customAttributeId = implode(",",$_POST['ArticleForm']['customAttributeId']);
			}
			$articleModel->operator = Yii::app()->session['user'];
			$articleModel->createdTime = date("Y-m-d H:i:s");
			$articleModel->setAttributes($_POST['ArticleForm']);
	

						
			if($articleModel->save())
			{				
				if(is_object($image) && get_class($image)==='CUploadedFile')
				{
					$image->saveAs($articleModel->thumb);	//路径必须真实存在，并且如果是linux系统，必须有修改权限
				}
				
				$this->redirect(array('/admin/article/index'));				
			}
		}
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		
		
		$criteria = new CDbCriteria();			
		$categoireList = Categorie::model()->findAll($criteria);
		$categoireListJson = CJSON::encode($categoireList);						
		$this->render('create',array(				
			'model'=>$articleFrom,
			'categoireListJson'=>$categoireListJson,			
		));
	
	}
	
	/**
	 * create img
	 */
	public function actionGetAjaxImg()
	{
		$articleModel = new Article;
		$articleFrom = new ArticleForm;
		
		$image=CUploadedFile::getInstanceByName('thumb');
		
		if (is_object($image) && get_class($image)==='CUploadedFile')
		{
			$filename = md5(uniqid());
			$flode = $this->getFlodedate();
			$ext = $image->extensionName;
			$articleModel->thumb=IMG_UPLOAD.$flode.'/'.$filename.'.'.$ext;  //请根据自己的需求生成相应的路径，但是要记得和下面保存路径保持一致
			$thumbUrl = Yii::app()->homeUrl.'/uploads/allimg/'.$flode.'/'.$filename.'.'.$ext;
			$image->saveAs($articleModel->thumb);	//路径必须真实存在，并且如果是linux系统，必须有修改权限
			$thumbFile = '/uploads/allimg/'.$flode.'/'.$filename.'.'.$ext;
		}else{
			$articleModel->thumb='NoPic.jpg';
		}

		$str = json_encode(
				array(
						'upfile'=>array(
								'file' => $thumbFile,	//原图相对地址
								'fileUrl' => $thumbUrl,
						)
				)
		);		
		echo $str;
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{				
		$id = $_GET['id'];
		$articleFrom = new ArticleForm;
		
		$model=$this->loadModel($id);
		$model->customAttributeId = explode(",",$model->customAttributeId);
		
		$articleFrom->attributes = $model->attributes;
		//$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//print_r($model->getAttributes());
		//$model->customAttributeId = explode(",",$model->customAttributeId);
		/*
		if(!empty($_POST['ArticleForm']['customAttributeId']))
		{
			$articleModel->customAttributeId = implode(",",$_POST['ArticleForm']['customAttributeId']);
		}
		$articleModel->operator = Yii::app()->session['user'];
		$articleModel->createdTime = date("Y-m-d H:i:s");
		$articleModel->setAttributes($_POST['ArticleForm']);
		 */
		//print_r($_POST['content']);exit;
		if(isset($_POST['ArticleForm']))
		{
			$model=$this->loadModel($id);
			
			if(!empty($_POST['ArticleForm']['customAttributeId']))
			{
				$model->customAttributeId = implode(",",$_POST['ArticleForm']['customAttributeId']);
			}			
			$model->operator = Yii::app()->session['user'];			
			$model->setAttributes($_POST['ArticleForm']);
			if($model->save())
			{
				$this->redirect($id);
			}
				
		}
		
		$criteria = new CDbCriteria();
		$categoireList = Categorie::model()->findAll($criteria);
		$categoireListJson = CJSON::encode($categoireList);
		
		$this->render('update',array(
			'model'=>$articleFrom,
			'categoireListJson'=>$categoireListJson,		
			'id'=>$id,		
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'categorie/index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$id = $_POST['id'];
		if(empty($id))	return false;
		$this->loadModel($id)->delete();
		Article::model()->deleteAll('categoryParentId=:catParentId',array(':catParentId'=>$id));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			
		/*
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//article						
		$criteria = new CDbCriteria();
		//$criteria->order = 'id DESC' ;//排序条件
		$artcileList = Article::model()->findAll($criteria);
		//print_r($artcileList);
		
		//var_dump(Article::model()->getAttributes());
		//$categoireListJson = CJSON::encode($categoireList);
		$this->render('index',array(
				'list'=>$artcileList,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{		
		
		$model=new User('search');					
		$model->unsetAttributes();  // clear any default values
			
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
		
		$criteria = new CDbCriteria();
		/*
		$count = User::model()->count($criteria);
		
		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		*/
		$artList = User::model()->findAll($criteria);				
			
		$this->render('admin',array(
				'model'=>$model,
				'list'=>$artList,
				//'pages'=>$pager,
		));		
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ArticleForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
