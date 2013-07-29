<?php

class CategorieController extends Controller
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
				'actions'=>array('create','index','view'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$categorieForm=new CategorieForm;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($modelForm);
		
		if(isset($_POST['CategorieForm']))
		{
			$categorieModel = new Categorie;
			$categorieModel->categoryParentId = intval($_GET['catParentId']);
			$categorieModel->operator = Yii::app()->session['user'];
			$categorieModel->createdTime = date("Y-m-d H:i:s");
			$categorieModel->attributes=$_POST['CategorieForm'];
			
			if($categorieModel->save())
				$this->redirect(array('index'));
		}

		
		$this->render('create',array(
			'model'=>$categorieForm,
			'buttonState'=>'Save',
		));
	
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{				
		$id = $_GET['categoryId'];
		$categorieForm=new CategorieForm;
		
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$categorieForm->attributes = $model->attributes;
		if(isset($_POST['Categorie']))
		{
			$model->operator = Yii::app()->session['user'];			
			$model->attributes=$_POST['Categorie'];
			if($model->save())
				$this->redirect(array('index'));
		}
		$this->render('update',array(
			'model'=>$categorieForm,
			'buttonState'=>'Update',				
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
		Categorie::model()->deleteAll('categoryParentId=:catParentId',array(':catParentId'=>$id));
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
		$criteria = new CDbCriteria();	
		$categoireList = Categorie::model()->findAll($criteria);
		
		
		//var_dump($categoireList);exit;
		//print_r($categoireList);
		$categoireListJson = CJSON::encode($categoireList);
		$this->render('index',array(
			'categoireList'=>$categoireList,
			'categoireListJson'=>$categoireListJson,
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
	
		$artList = User::model()->findAll($criteria);				
			
		$this->render('admin',array(
				'model'=>$model,
				'list'=>$artList,
		));		
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categorie the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categorie::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param categorie $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categorieForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
