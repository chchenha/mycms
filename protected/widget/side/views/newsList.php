					<div class="tdc">
					<h3>Latest from Design Resource Box</h3>
						<ul>
						<?php
							if(count($list))
							{ 
								foreach($list as $k => $v)
								{
						?>
									<li><a href="http://feedproxy.google.com/~r/DesignResourceBox/~3/2ZY2qRVNXBo/" title="Posted 30 May 2013 | 12:40 pm"><?php echo $v['title'];?></a></li>										
						<?php 	
								}
							}
						?>
						</ul>
					</div>