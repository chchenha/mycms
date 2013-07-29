<?php
/**
 * SmartMad 系统中的公用方法类
 *
 * $Id: Fun.php 9389 2012-09-10 09:58:01Z sunxiang $
 */

class Fun {
	function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') 
	{ 
		if($code == 'UTF-8') 
		{ 
			$pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; 
			preg_match_all($pa, $string, $t_string); 
			if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."..."; 
			return join('', array_slice($t_string[0], $start, $sublen)); 
		}else{ 
			$start = $start*2; 
			$sublen = $sublen*2; 
			$strlen = strlen($string); 
			$tmpstr = ''; 
			for($i=0; $i<$strlen; $i++) 
			{ 
				if($i>=$start && $i<($start+$sublen)) 
				{ 
					if(ord(substr($string, $i, 1))>129) 
					{ 
						$tmpstr.= substr($string, $i, 2); 
					}else{ 
						$tmpstr.= substr($string, $i, 1); 
					} 
				} 
				
				if(ord(substr($string, $i, 1))>129) $i++; 
			} 
			if(strlen($tmpstr)<$strlen ) $tmpstr.= "..."; 
			return $tmpstr; 
		} 
	}
	
	
	//让列表页之出一张图片或者代码
	public static function getPic($html)
	{
		preg_match_all('/(?<img>.*?\/>)/i',$html,$arr);
		if(count($arr['img']))
		{
			$displayHtml = empty($arr['img'][0])?'':$arr['img'][0];
		}else{
			//获取pre
			preg_match_all(('/(?<pre><pre class=\'\b(htmlCode|phpCode|cssCode|jsCode)\b.*?pre>)/i'), $html, $arr);
			$displayHtml = empty($arr['pre'][0])?'':$arr['pre'][0];
			//$displayHtml = $arr['pre'][0];
		}
		//$displayHtml = empty($displayHtml)?'':$displayHtml;
		return $displayHtml;		
	}
}
