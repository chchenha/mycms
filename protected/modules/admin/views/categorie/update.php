<?php
/* @var $this CategorieController */
/* @var $model Categorie */
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
					<h2><i class="icon-user"></i> 新建栏目</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<?php echo $this->renderPartial('_form', array('model'=>$model,'buttonState'=>$buttonState)); ?>      
				</div>
			</div><!--/span-->
								 
			<div style="margin-left:15px;"><a href="/admin/categorie/index">返回栏目管理</a></div>
		</div><!--/row-->
		
		