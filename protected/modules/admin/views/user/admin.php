<!-- user js -->
<script language="javascript">
$(document).ready(function(){
	$(".btn-danger").live('click',function(){		
		var id = $(this).attr("userDel");
		$('.modal-body').html('确定要删除此用户');			
		$('#myDel').val(id);
		$('#myDel').modal('show');
	});	

	$(".btn-primary").live('click',function(){
		var id = $('#myDel').val();	
		$.post("/admin/user/delete", { id: id},
		function(data) {
			$('#myDel').modal('hide');
			$('#trUser'+id).remove();
		});		
	});	
});
</script>
		<!-- content starts -->			
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Tables</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">					
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo Yii::t('adminUser','userManage');?></h2>
						<div class="box-icon">
						</div>
					</div>
					
					<div class="box-content">
						<a class="btn btn-success" href="/admin/user/create">
							<i class="icon-user icon-white"></i>  
										<?php echo Yii::t('adminUser','newUser');?>                                            
						</a>
					</div>
					<div class="box-content">
						<?php 
						$this->widget('zii.widgets.grid.CGridView', array(
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'columns'=>array(
								array(
									'name'=>'username',
									'type'=>'text',
								),
								array(
										'name'=>'email',
										'type'=>'text',
								),

								array(
									'header' => '操作',
									'class'=>'CButtonColumn',
								),
							),
						)); ?>					     
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="text-align:center;">		
			
			</div>

					<!-- content ends -->