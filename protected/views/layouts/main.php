<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/css/jquery.snippet.min.css" />
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.snippet.min.js"></script>
<script type="text/javascript" charset="utf-8">
	     $(function () {
	         $("pre.htmlCode").snippet("html", { style: "darkness", showNum: true,clipboard:"/js/ZeroClipboard.swf", collapse: true, startCollapsed: false,
                        showMsg:"展开代码",hideMsg:"收起代码" });

	         $("pre.phpCode").snippet("php", { style: "darkness", showNum: true,clipboard:"/js/ZeroClipboard.swf", collapse: true, startCollapsed: false,
                 showMsg:"展开代码",hideMsg:"收起代码" });

	         $("pre.cssCode").snippet("css", { style: "darkness", showNum: true,clipboard:"/js/ZeroClipboard.swf", collapse: true, startCollapsed: false,
                 showMsg:"展开代码",hideMsg:"收起代码" }); 

	         $("pre.jsCode").snippet("javascript", { style: "darkness", showNum: true,clipboard:"/js/ZeroClipboard.swf", collapse: true, startCollapsed: false,
                 showMsg:"展开代码",hideMsg:"收起代码" });                                        
	     });
</script>
<title>无标题文档</title>
</head>

<body>
	<div id="sitewrapper">
		<div class="header">
			<div class="logo"></div>
			<div class="headrad">
				<img src="/images/H2vKEhm.jpg">
			</div>
			<div class="clear"></div>	
		</div>
		
		<div class="menuwrapper">
			<div class="menu">
				<ul>
					<li><a href="/site/index">首页</a></li>
					<li><a href="/site/cpanel">Cpanel教程</a></li>
					<li><a href="/site/about">over the wall</a></li>					
				</ul>
			</div>
			
			<div class="socialize">
				<div class="socializeleft">Subscribe to get the latest inspiration and resources</div>
				<div class="socializeicons">
					<a href="#"><img src="/images/rss.gif" alt="" width="33" height="33" style="margin-right:8px;"></a> 
					<a href="#"><img src="/images/mail.gif" alt="" width="33" height="33" style="margin-right:8px;"></a> 
					<a href="#"><img src="/images/tw.gif" alt="" width="33" height="33" style="margin-right:8px;"></a> 
					<a href="#"><img src="/images/fb.gif" alt="" width="33" height="33" style="margin-right:8px;"></a>  
					<a href="#"><img src="/images/gplus.gif" alt="" width="33" height="33" style="margin-right:8px;"></a></div>		
			</div>		
			<div class="clear"></div>		
		</div>
	
		<?php echo $content; ?>
	</div>	
			
	
	<div class="footer">
		<div class="credit"><div class="creditext">©  Design your way. Resources and inspiration for designers. A new and responsive design is in the making</div></div>	
	</div>
</body>
</html>