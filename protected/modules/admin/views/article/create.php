<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
*/

?>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i> </h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<?php echo $this->renderPartial('_form', array('model'=>$model,'categoireListJson'=>$categoireListJson)); ?>      
				</div>
			</div><!--/span-->
								 
			<div style="margin-left:15px;"><a href="/admin/user/index"><?php Yii::t('adminUser','returnUserManage')?></a></div>
		</div><!--/row-->
		
		