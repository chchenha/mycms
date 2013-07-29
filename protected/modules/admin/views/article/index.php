<script language="javascript">

	$(document).ready(function(){
		$('#addArticle').click(function(){
			location.href="/admin/article/create";
		})
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
						<div style="width:75%">
							<h2><i class="icon-th"></i> 文档列表</h2>
						</div>
						<div class="box-icon">
							<button class="btn btn-small btn-primary" id="addArticle">添加文档</button>
						</div>
					</div>
					
		
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="cat">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>选择</th>
								  <th>文章标题</th>
								  <th>录入时间</th>
								  <th>类目</th>
								  <th>发布人</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  		if(count($list))
						  		{
							  		foreach($list as $k=>$v){
										$customAttributeIdCnArr = Article::getcustomAttributeIdCn($v['customAttributeId']);
										$catIdCn = Categorie::getCatCn($v['catId']);
							  	?>
									<tr>
										<td><?php echo $v['id'];?></td>
										<td><?php echo implode(",",$customAttributeIdCnArr)?></td>
										<td><?php echo $v['title'];?></td>
										<td><?php echo $v['createdTime'];?></td>
										<td><?php echo $catIdCn;?></td>
										<td><?php echo $v['operator'];?></td>
										<td><a href="/admin/article/update/id/<?php echo $v['id'];?>">编辑</a></td>																
									</tr>	
								<?php 
									}
						  		}
							?>
						  </tbody>						  					  
					  	</table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="text-align:center;">		
			<div id="pager">  

    		</div>  	
			</div>			
					<!-- content ends -->