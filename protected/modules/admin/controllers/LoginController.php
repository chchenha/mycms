<?php

class LoginController extends Controller
{
	public $layout='/layouts/column2';
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{				
		
		$baseUrl = Yii::app()->baseUrl;
		
		$model=new LoginForm;
		// if it is ajax validation request		
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/
		// collect user input data
		if(isset($_POST['LoginForm']))
		{					
			$model->attributes=$_POST['LoginForm'];			
			// validate user input and redirect to the previous page if valid
		
			if($model->validate() && $model->login()){
				Yii::app()->session['user']=$_POST['LoginForm']['username'];
				$this->redirect('/admin/user/index');
			}
		}
		// display the login form
		if(isset(Yii::app()->session['user']))
		{
			$this->redirect('/admin/user/index');
		}else{			
			$this->render('/default/login',array('model'=>$model));
		}
	}
}