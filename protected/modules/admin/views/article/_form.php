<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<style>
div.form label{display:inline-block;}
</style>
<link rel="stylesheet" href="/js/admin/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/js/admin/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="/js/admin/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/js/admin/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/js/admin/kindeditor/plugins/code/prettify.js"></script>
<script>

	KindEditor.ready(function(K) {		
		var editor1 = K.create('textarea[name="ArticleForm[\'content\']"]', {
			cssPath : '/js/admin/kindeditor/plugins/code/prettify.css',
			uploadJson : '/js/admin/kindeditor/php/upload_json.php',
			fileManagerJson : '/js/admin/kindeditor/php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				K.ctrl(document, 13, function() {
					//self.sync();
					//K('form[name=example]')[0].submit();
				});
				K.ctrl(self.edit.doc, 13, function() {
					//self.sync();
					//K('form[name=example]')[0].submit();
				});
			}
		});
		prettyPrint();
	});
</script>

<script language="javascript">
	var categoireListJson = <?php echo $categoireListJson;?>;
	<?php if(isset($_GET['id']))
	{?>
		var id = <?php if(isset($_GET['id'])){echo $_GET['id'];}?>;
	<?php
	}else{
	?>
		var id = 0;
	<?php 
	}
	?>
	//console.log(id);
	<?php if(isset($model->catId))
	{?>	
	var catId = <?php echo $model->catId;?>;	
	<?php
	}else{?>
	
	<?php } 
	?>	
	
	var catArr = new Array();
	var catParentArr = new Array();
	
	$(document).ready(function(){
		
		//初始化分类
		var initCat = function(way){
			if(categoireListJson.length > 0)
			{
				var catHtml = '<span><select class="catOption" name="ArticleForm[catId]"><option value="0">请选择</option>';
				
				$.each(categoireListJson,function(idx,item){
					var categoryParentId = item.categoryParentId;
					var categoryName = item.categoryName;
					var categoryId = item.categoryId;
		
						
					if(categoryParentId == 0)
					{
						catHtml+='<option value="'+categoryId+'">'+categoryName+'</option>';
					}
				})
				catHtml+='</select></span>';
				$('#cat').html(catHtml);
			}
		}

		

		
		var insertCatArrAndcatParentArr = function(){
			if(categoireListJson.length > 0)
			{
				$.each(categoireListJson,function(idx,item){
					var categoryId = item.categoryId;
					var categoryName = item.categoryName;
					var categoryParentId = item.categoryParentId;
					
					if(catId == categoryId)
					{
						catArr.push(catId);
						if(categoryParentId != 0)
						{
							catId = categoryParentId;
							catParentArr.push(catId);	
							insertCatArrAndcatParentArr();
						}else{
							catId = 0;
							catParentArr.push(catId);
						}
					}
				});
			}
		}

		var initUpdateCat = function(){
			catParentArr = catParentArr.reverse();
			catArr = catArr.reverse();
			
			
			if(catParentArr.length)
			{
				var catHtml = '';
				var catHtmlAll = '';
				
				$.each(catParentArr,function(index, content){
					catHtml+= '<span><select class="catOption" name="ArticleForm[catId]">';
					
					$.each(categoireListJson,function(idx,item){
						var categoryParentId = item.categoryParentId;
						var categoryName = item.categoryName;
						var categoryId = item.categoryId;
						
						if(content == categoryParentId)
						{
							//console.log("catArr:"+catArr[index]);
							var isselected = (catArr[index] == categoryId)?'selected':'';
							catHtml+='<option value="'+categoryId+'" '+isselected+'>'+categoryName+'</option>';
						}		
					})
					catHtml+='</select></span>';						
				});
				catHtmlAll+=catHtml;
			}
			$('#cat').html(catHtml);			
		}
		
		var openSubCat = function(catId,o){
			var i = 0;
			if(catId>0)		//需要选择类别
			{			
				var catHtml = '<span><select class="catOption" name="ArticleForm[catId]">';
				
				$.each(categoireListJson,function(idx,item){
					var categoryParentId = item.categoryParentId;
					var categoryName = item.categoryName;
					var categoryId = item.categoryId;
					
					if(catId == categoryParentId)	
					{
						i++;
						catHtml+='<option value="'+categoryId+'">'+categoryName+'</option>';
					}		
				})
				catHtml+='</select></span>';
			}
			//console.log(catHtml);
			
			if(i>0)
			{
				$(o).parent().nextAll().remove();
				$(o).parent().after(catHtml);
			}else{
				//console.log('1');
				$(o).parent().nextAll().remove();
			}
			
		}

		$(".catOption").live('change',function(){
			var parentCatId = $(this).val();
			openSubCat(parentCatId,this);
		})

		//上传图片
	    $('#fileupload').fileupload({
	        dataType: 'json',
	        url: '/admin/article/getAjaxImg',        
	        success: function (json) {
	                $('#ArticleForm_thumb').attr('value',json.upfile.file);
	                $("#thumbUrl").attr('src',json.upfile.fileUrl);
	                $("#thumbUrl").show();
	        }
	    });

		//删除
	    $('#delThumb').click(function(){
		    $('#thumbUrl').hide();
		    $('#ArticleForm_thumb').val("");
		    
		})
		
		if(id)
		{
			insertCatArrAndcatParentArr();
			initUpdateCat();
		}else{
			initCat();
		}
	})
	

</script>	
<div class="form">
						<?php $form=$this->beginWidget('CActiveForm',array(
								'id'=>'article-form',
								'enableAjaxValidation' => false,
								'enableClientValidation'=>true,
								'clientOptions'=>array(
										'validateOnSubmit'=>true,																			
								),
								'htmlOptions'=>array('enctype'=>'multipart/form-data','name'=>'example'),								
								));?>
							<table class="table table-striped table-bordered">
								<tr>
									<td>	
										<?php echo $form->labelEx($model,'title',array('class'=>'formLabel'));?>																			
										<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'title'); ?>									
									</td>
								</tr>
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'customAttributeId',array('class'=>'formLabel'));?>
										<?php echo $form->checkBoxList($model,'customAttributeId',Yii::app()->params['artcile']['customAttributeId'],array('separator'=>' ','template'=>'{label} {input} ')); ?>																				
										<?php echo $form->error($model,'customAttributeId'); ?>							
									</td>
								</tr>
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'thumb',array('class'=>'formLable')); ?>									
										<input id="fileupload" type="file" name="thumb" />	
										<img id="thumbUrl" src="<?php if($model->thumb){echo Yii::app()->homeUrl.$model->thumb;}?>"/>
										<?php echo $form->hiddenField($model,'thumb'); ?>																			
										<?php echo $form->error($model,'thumb'); ?>
										<span><a id="delThumb">删除</a></span>
									</td>
								</tr>	
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'catId',array('class'=>'formLabel')); ?>
										<div id="cat">

										</div>
										<?php echo $form->error($model,'catId'); ?>								
									</td>
								</tr>	
								
								
								<tr>
									<td>
										<?php echo $form->labelEx($model,'intro'); ?>
										<?php echo $form->textArea($model,'intro',array('style'=>'width:500px;height:200px;'));?>
										<?php echo $form->error($model,'intro'); ?>								
									</td>
								</tr>		
																
								<tr>
									<td>
										<?php echo $form->labelEx($model,'content'); ?>
										<?php echo $form->textArea($model,'content',array('style'=>'width:900px;height:400px;visibility:hidden;'));?>
										<?php echo $form->error($model,'content'); ?>								
									</td>
								</tr>									
																
								<tr>
									<td>
										<?php echo CHtml::submitButton("Save"); ?>
									</td>
								</tr>															
						  </table>    
					  <?php $this->endWidget(); ?>  
					  

			

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/admin/jquery.ui.widget.js', CClientScript::POS_END);?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/admin/jquery.iframe-transport.js', CClientScript::POS_END);?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/admin/jquery.fileupload.js', CClientScript::POS_END);?>
	  
