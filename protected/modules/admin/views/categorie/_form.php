<?php
/* @var $this CategorieController */
/* @var $model Categorie */
/* @var $form CActiveForm */
?>

<div class="form">
						<?php $form=$this->beginWidget('CActiveForm',array(
								'id'=>'categorieForm',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
											'validateOnSubmit'=>true,
									),
								));?>
							<table class="table table-striped table-bordered">
								<tr>
									<td>
										<?php echo $form->labelEx($model,'categoryName'); ?></div>
										<?php echo $form->textField($model,'categoryName',array('size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'categoryName'); ?>		
									</td>
								</tr>
								
								
								<tr>
									<td>
										<?php echo CHtml::submitButton($buttonState); ?>										
									</td>
								</tr>															
						  </table>    
					  <?php $this->endWidget(); ?>  
					  
