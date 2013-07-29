			<link rel="stylesheet" type="text/css" href="/css/form.css" />
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to Charisma</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Please login with your Username and Password.
					</div>
					<div class="form">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'login-form',
							//'enableAjaxValidation' => true,
						/*
							'enableClientValidation'=>true,								
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							*/
							'htmlOptions'=>array(
								'class'=>'form-horizontal'
							),
						)); ?>					
							<fieldset>
								<div class="input-prepend" title="Username" data-rel="tooltip">
									<span class="add-on"><i class="icon-user"></i></span>
									<?php echo $form->textField($model,'username',array('class'=>'input-large span10','autofocus'=>'autofocus')); ?>
									<?php echo $form->error($model,'username'); ?>
								</div>
								<div class="clearfix"></div>
	
								<div class="input-prepend" title="Password" data-rel="tooltip">
									<span class="add-on"><i class="icon-lock"></i></span>
									<?php echo $form->passwordField($model,'password',array('class'=>'input-large span10')); ?>
									<?php echo $form->error($model,'password'); ?>																						
								</div>
								<div class="clearfix"></div>
	

	
								<p class="center span5">
									<!--  <button type="submit" class="btn btn-primary">Login</button> -->
									<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary')); ?>
								</p>
							</fieldset>
						<?php $this->endWidget(); ?>	
					</div>					
				</div><!--/span-->
			</div><!--/row-->