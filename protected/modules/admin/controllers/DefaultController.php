<?php

class DefaultController extends Controller
{
	public $layout='/layouts/column2';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionIndex()
	{				
		$this->redirect('/admin/login');
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/admin/login');
	}
}