<!-- user js -->
<style>
.icon-plus .icon-minus{cursor:pointer;}
.icon-bank{width:14px;}
.catDel{cursor:pointer;}
</style>
<script language="javascript">
	var categoireListJson = <?php echo $categoireListJson;?>;
	
	$(document).ready(function(){
		var firstCatHtml = '';
		
		var openSubCat = function(o,catId){
			var CatHtml = '';
			var newHtml = '';
			var oldHtml = $(o).parent().parent().parent().html();

			var bankNum = parseInt(o.prev().attr("bankNum"));
			console.log(bankNum);
			var marginLeftPx = bankNum+28;
			
			$.each(categoireListJson,function(idx,item){
				var categoryParentId = item.categoryParentId;		
				var categoryName = item.categoryName;
				var categoryId = item.categoryId;
				if(catId == categoryParentId)
				{
					var trCatId = 'trCat'+categoryId;
					var trCatParent = 'trCatParent'+categoryParentId;
					
					var iconHtml = getIcon(categoryId);
					CatHtml+='<tr id="'+trCatId+'" class="'+trCatParent+'"><td width="74%"><span style="margin-left:'+marginLeftPx+'px;" banknum="'+marginLeftPx+'"></span><i '+iconHtml+' openCatId="'+categoryId+'"></i>&nbsp;&nbsp;&nbsp;&nbsp;<div class="checker"><span><input type="checkbox" style="opacity: 0;"></span></div>'+categoryName+'[ID:'+categoryId+'](文档:0)&nbsp;<i class="icon-pencil"></i></td><td width="26%"><a href="/admin/categorie/create/catParentId/'+categoryId+'">增加子类</a>|<a href="/admin/categorie/update/categoryId/'+categoryId+'">更改</a>|<a class="catDel" delcat="'+categoryId+'">删除</a></td></tr>';
				}
			});
			var tbodyO = $(o).parent().parent();
			$(tbodyO).after(CatHtml);
			
			/*
			note:the same effect
			var newHtml = oldHtml+CatHtml;
			$(o).parent().parent().parent().html(newHtml);
			*/
		};

		
		var getIcon = function(catId){
			var isExistIconPlus = 'class="icon-bank"';
			$.each(categoireListJson,function(idx,item){
				var categoryParentId = item.categoryParentId;	
				
				if(catId == categoryParentId)
				{
					isExistIconPlus = 'class="icon-plus"';
					return false;
				}
			});
			return isExistIconPlus;
		}


		
		$.each(categoireListJson,function(idx,item){
			var categoryParentId = item.categoryParentId;		
			var categoryName = item.categoryName;
			var categoryId = item.categoryId;
			
			if(categoryParentId == 0)
			{
				var iconHtml = getIcon(categoryId);
				var trCatId = 'trCat'+categoryId;
				firstCatHtml+='<table><tr id="'+trCatId+'"><td width="74%"><span style="margin-left:8px;" bankNum="8"></span><i '+iconHtml+'  openCatId="'+categoryId+'"></i><input type="checkbox">'+categoryName+'[ID:'+categoryId+'](文档:0)&nbsp;<i class="icon-pencil"></i></td><td width="26%"><a href="/admin/categorie/create/catParentId/'+categoryId+'">增加子类</a>|<a href="/admin/categorie/update/categoryId/'+categoryId+'">更改</a>|<a class="catDel" delcat="'+categoryId+'">删除</a></td></tr></table>';				

				$('#cat').html(firstCatHtml);
			}
		});


		$(".icon-plus").live('click',function(){
			o = $(this);
			var catId = $(this).attr("openCatId");
			if(catId)
			{
				openSubCat(o,catId);
			}

			$(this).attr("class","icon-minus");
			$('.icon-minus').attr("style","cursor:pointer;")
			
			
			$(this).removeAttr("openCatId");
			$(this).attr("closeCatId",catId);			
		});

		$(".icon-minus").live('click',function(){
			var id = $(this).attr("closecatid");
			if($('.trCatParent'+id).length)
			{
				$('.trCatParent'+id).remove();
				$(this).attr("class","icon-plus");

				$('.icon-plus').attr("style","cursor:pointer;")
				
				$(this).removeAttr("closeCatId");
				$(this).attr("openCatId",id);					
			}			
			$(".trCatParent"+id);
		});

		$("#addFCat").click(function(){
			location.href="/admin/categorie/create/catParentId/0";
		})

		$(".catDel").live('click',function(){		
			var id = $(this).attr("delcat");	
			$('.modal-body').html('确定要删除此栏目');
			$('#myDel').val(id);
			$('#myDel').modal('show');
		});


		//点击删除
		$(".btn-primary").live('click',function(){			
			var id = $('#myDel').val();				
			
			$.post("/admin/categorie/delete", { id: id},
			function(data) {
				window.location.reload(true);
				/*				
				如果这样写有BUG
				$('#myDel').modal('hide');						
				$('#trCat'+id).remove();
				
				if($('.trCatParent'+id).length)
				{
					$('.trCatParent'+id).remove();
				}
				*/
			});
						
		});
	});	
</script>	
<style>
.table th, .table td {padding:4px;};
</style>
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
							<h2><i class="icon-th"></i> 网站栏目管理</h2>
						</div>
						<div class="box-icon"  style="width:25%">
							<button class="btn btn-small btn-primary" id="addFCat">增加顶级栏目</button>
						</div>
					</div>
					
		
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable" id="cat">
						  					  
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="text-align:center;">		
			<div id="pager">  

    		</div>  	
			</div>			
					<!-- content ends -->
				