<!-- user js -->
<?php Yii::app ()->clientScript->registerScriptFile( Yii::app()->baseUrl . '/js/user/common.js',CClientScript::POS_END);?>

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
						<h2><i class="icon-user"></i><?php echo Yii::t('adminUser','member');?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
						  <?php //print_r($model);?>
							  <tr>
								  	<td><?php Yii::t('adminUser','id:');?><?php echo $model->id; ?></td>
							  </tr>
							  <tr>
									<td><?php Yii::t('adminUser','username:');?><?php echo $model->username; ?></td>										  
							  </tr>
							  <tr>
									<td><?php Yii::t('adminUser','password:');?><?php echo $model->password; ?></td>
							  </tr>
							  <tr>
									<td><?php Yii::t('adminUser','email:');?><?php echo $model->email; ?></td>
							  </tr>							  
						  </thead>   
						  <tbody>

				  
			  
						
							<?php //}?>							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


					<!-- content ends -->