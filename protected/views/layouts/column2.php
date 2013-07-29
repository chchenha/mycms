<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="contentwrapper">
	<div id="content">        
		<?php echo $content; ?>		
	</div>
	
		<!-- sidebar start -->
		<div class="sidebar">				
					<div class="sponsors">
						<a href="#" target="_blank"><img src="/images/cpanel.jpg" width="200" height="125" alt="Stamplia : email templates marketplace"></a>
						<a href="#" target="_blank"><img src="/images/phpzhuji.jpg" width="200" height="125" alt="Stamplia : email templates marketplace"></a>
					</div>
					
					<!-- 
					<div class="search">
						<div id='cse' style='width: 100%;'>Loading</div>
						<script src='//www.google.com/jsapi' type='text/javascript'></script>
						<script type='text/javascript'>
						google.load('search', '1', {language: 'zh-Hans', style: google.loader.themes.V2_DEFAULT});
						google.setOnLoadCallback(function() {
						  var customSearchOptions = {};
						  var orderByOptions = {};
						  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
						  customSearchOptions['enableOrderBy'] = true;
						  customSearchOptions['orderByOptions'] = orderByOptions;
						  customSearchOptions['overlayResults'] = true;
						  var customSearchControl =   new google.search.CustomSearchControl('000238382594838585699:wv71wpayq8w', customSearchOptions);
						  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
						  var options = new google.search.DrawOptions();
						  options.setAutoComplete(true);
						  customSearchControl.draw('cse', options);
						}, true);
						</script>
					</div>
					 -->
					<!--cooldesignjobs start-->
					<?php $this->beginWidget('application.widget.side.recommendWidget'); ?>
					<?php $this->endWidget(); ?>					
					<!--cooldesignjobs end-->		
				
					<!-- tdc start-->
					<?php $this->beginWidget('application.widget.side.newsWidget'); ?>
					<?php $this->endWidget(); ?>					
					<!-- tdc end-->			
				
				<!-- friends start-->	
				<!-- 
				<div class="friends">
					<h3>Latest from The Design Club</h3>
						<ul>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
							<li><a href="http://feedproxy.google.com/~r/thedesignclub/~3/vRhiNfmFO3c/" title="Posted 14 June 2013 | 10:49 am">Introducing Cloud Computing and Cloudiro</a></li>
						</ul>
				</div>			
				 -->
				<!-- friends end-->		
		</div>
		<!-- sidebar end -->
		
		<div class="clear"></div>	
</div>
<?php $this->endContent(); ?>