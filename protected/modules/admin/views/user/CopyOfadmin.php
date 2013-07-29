<!-- 
说明:此页是利用模板自带的html5来实现翻页，查找功能
-->
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th><?php echo Yii::t('adminUser','username');?></th>
								  <th><?php echo Yii::t('adminUser','registerTime');?></th>
								  <th><?php echo Yii::t('adminUser','operate');?></th>
							  </tr>
						  </thead>   
						  <tbody>

						  	<?php foreach($list as $k => $v){?>						  
							<tr id="trUser<?php echo $v['id'];?>">
								<td><?php echo $v['username'];?></td>
								<td class="center">2012/01/01</td>
								<td class="center">
									<a class="btn btn-info" href="/admin/user/update/id/<?php echo $v['id'];?>">
										<i class="icon-edit icon-white"></i>  
										<?php echo Yii::t('adminUser','editUser');?>                                            
									</a>
									<a class="btn btn-danger" userDel="<?php echo $v['id'];?>">									
										<i class="icon-trash icon-white"></i> 
										<?php echo Yii::t('adminUser','delUser');?>
									</a>
								</td>
							</tr>
							<?php }?>							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="text-align:center;">		
			
			</div>

					<!-- content ends -->