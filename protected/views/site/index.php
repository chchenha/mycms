			<?php 
			if(isset($list) && count($list)){
				foreach($list as $k => $v)
				{	
					$id = $v['id'];
					$title = $v['title'];
					$intro = $v['intro'];
					$content = $v['content']; 
					$thumb = empty($v['thumb'])?'':$v['thumb'];
			?>
			<!-- post start-->
			<div class="post">
				<h2><a href="/site/article?id=<?php echo $id;?>" title="Permalink to Hipmunk Case Study: UX Lessons for Web Developers" rel="bookmark"><?php echo $title;?></a></h2>
				<div class="entry-content">
					<?php
						echo $intro;
					?>
					
				</div>
				
				<div class="fin">
					<div class="readmore"><a href="/site/article?id=<?php echo $id;?>">Read more</a></div>
				</div>				
			</div>
			<!--post end-->
			<?php 
				}
			}
			?>


				
			<div class="pagination">
   			<?php        
			    $this->widget('CLinkPager',array(    
			        'header'=>'',    
			        'firstPageLabel' => '',    
			        'lastPageLabel' => '',    
			        'prevPageLabel' => '« Previous Page',    
			        'nextPageLabel' => 'Next Page »',    
			        'pages' => $pages,    
			        'maxButtonCount'=>0,
					'cssFile'=>'/css/style.css',
			        )    
			    );    
    		?>    			
			</div>				
		

	

