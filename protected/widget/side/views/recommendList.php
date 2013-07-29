<div class="cooldesignjobs">
	<h3>推荐文章</h3>
	<ul>
		<?php if(count($list))
		{
			foreach($list as $k => $v)
			{
		?>
		<li><a href="" title=""><?php echo $v['title'];?></a></li>		
		<?php
				//print_r($v);
			}	
		}
		?>
	</ul>
</div>	
