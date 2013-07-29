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
					<div style="float:right;">					
						<a href="/site/article?id=<?php echo $id;?>" style="float: left;margin: 5px 2px;height: 18px;font-size:12px;" target="_blank">预  览</a>
						<a href="/admin/article/create" style="float: left;margin: 5px 2px;height: 18px;font-size:12px;">添加新闻</a>		
					</div>
				</div>
				<div class="box-content">
					<?php echo $this->renderPartial('_form', array('model'=>$model,'categoireListJson'=>$categoireListJson)); ?>      
				</div>
			</div><!--/span-->
								 
			<div style="margin-left:15px;"><a href="/admin/user/index"><?php Yii::t('adminUser','returnUserManage')?></a></div>
		</div><!--/row-->
		
		