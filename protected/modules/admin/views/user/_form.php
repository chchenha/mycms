<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
						<?php $form=$this->beginWidget('CActiveForm',array(
								'id'=>'user-form',
								//'enableAjaxValidation' => true,
								'enableClientValidation'=>true,
								'clientOptions'=>array(
										'validateOnSubmit'=>true,
								),
																
								));?>
							<table class="table table-striped table-bordered">
								<tr>
									<td>	
										<?php echo $form->labelEx($model,'username');?>										
										<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'username'); ?>									
									</td>
								</tr>
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'password'); ?>
										<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'password'); ?>									
									</td>
								</tr>
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'email'); ?>
										<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'email'); ?>								
									</td>
								</tr>	
								
								<tr>
									<td>
										<?php echo CHtml::submitButton($buttonState); ?>
									</td>
								</tr>															
						  </table>    
					  <?php $this->endWidget(); ?>  
					  
